<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use App\Policies\BlogsPolicy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {

      $this->authorize('viewAny', Blogs::class);

      $blogs = Blog::orderBy('id', 'desc')->paginate(15);

      return view('cms.blogs.index', compact('blogs'));
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Blogs::class);

      $authors = Author::all();
      $categories = Category::all();
      $tags = Tag::pluck('name', 'id')->toArray();
      return view('cms.blogs.create', compact('authors', 'categories', 'tags'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request, $status = 'posted')
   {
      $this->authorize('create', Blogs::class);
      $validator = validator($request->all(), [
         'name' => 'required|string|min:3|max:100',
      ], [
         'name.required' => 'الإسم مطلوب',
         'name.min' => 'لا يقبل  الاسم أقل من 3 حروف',
         'name.max' => 'لا يقبل  الاسم أكثر من 100 حروف',
      ]);

      if (!$validator->fails()) {
         $blog = new Blog();
         $blog->name = $request->get('name');
         $blog->date = $request->get('date');
         $blog->content = $request->get('editor');
         $blog->comments_enabled = $request->get('comments_enabled');
         $blog->category_id = $request->get('category_id');
         $blog->add_to_recent = $request->get('recent') == 'true' ? '1' : '0';
         $blog->add_to_main = $request->get('main') == 'true' ? '1' : '0';
         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/blog', $imageName);
            $blog->image = $imageName;
         }
         $blog->author_id = $request->get('author');
         $tags = json_decode($request->get('tags'));
         if ($request->get('dateschedule') != null) {
            $scheduledDate = $request->get('dateschedule');
            $blog->scheduled_at = date('Y-m-d H:i:s', strtotime($scheduledDate));
            if (strtotime(date('Y-m-d H:i:s')) < strtotime($scheduledDate)) {
               $blog->status = 'scheduled';
            }
         }
         if ($status == 'draft') {
            $blog->status = 'draft';
         } elseif ($status == 'posted') {
            $blog->status = 'posted';
         }
         $isSaved = $blog->save();

         if ($isSaved) {
            $tags = json_decode($request->get('tags'));
            foreach ($tags as $tag) {
               $tagModel = Tag::firstOrCreate(['name' => $tag->name]);
               $blog->tags()->attach($tagModel->id);
            }
            $isSavedTags = $blog->save();
            if ($isSavedTags) {
               return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
            } else {
               return response()->json(['icon' => 'error', 'title' => "فشلت عملية تخزين التسميات"], 400);
            }
         } else {
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Blogs  $blogs
    * @return \Illuminate\Http\Response
    */
   public function show(Blog $blogs)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Blogs  $blogs
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $this->authorize('update', Blogs::class);

      $blog = Blog::findOrFail($id);
      $authors = Author::all();
      $categories = Category::all();
      $tags = Tag::pluck('name', 'id')->toArray();
      return view('cms.blogs.edit', compact('blog', 'authors', 'categories', 'tags'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Blog  $blogs
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Blogs::class);

      $validator = validator($request->all(), [
         'name' => 'required|string|min:3|max:20',
      ], [
         'name.required' => 'الإسم مطلوب',
         'name.min' => 'لا يقبل أقل من 3 حروف',
         'name.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      if (!$validator->fails()) {
         $blog = Blog::findOrFail($id);
         $blog->name = $request->get('name');
         $blog->date = $request->get('date');
         $blog->content = $request->get('editor');
         $blog->comments_enabled = $request->get('comments_enabled');
         $blog->category_id = $request->get('category_id');
         $blog->add_to_recent = $request->get('recent');
         $blog->add_to_main = $request->get('main');
         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/blog', $imageName);
            $blog->image = $imageName;
         }
         $blog->author_id = $request->get('author');
         $tags = json_decode($request->get('tags'));
         $isSaved = $blog->save();

         if ($isSaved) {
            $tagIds = [];
            foreach ($tags as $tag) {
               $tagModel = Tag::firstOrCreate(['name' => $tag->name]);
               $tagIds[] = $tagModel->id;
            }
            $blog->tags()->sync($tagIds);

            return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
         } else {
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Blog  $blogs
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Blogs::class);

      $blog = Blog::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $blog ? 200 : 400);
   }
}
