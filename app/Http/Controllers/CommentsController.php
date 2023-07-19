<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index($id)
   {
      $this->authorize('viewAny', Comments::class);

      $blog = Blog::with('comments')->findOrFail($id);
      $comments = $blog->comments;
      return view('cms.comments.index', compact('comments'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create($id)
   {
      $this->authorize('create', Comments::class);

      $blog_id = $id;
      return view('cms.comments.create', compact('blog_id'));
   }


   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Comments::class);

      $validator = validator($request->all(), [
         'content' => 'required|string|min:3',
         'article_id' => 'required',
      ], [
         'content.required' => 'ادخل محتوى التعليق',
         'content.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      if (!$validator->fails()) {
         $comment = new Comment();
         $comment->content = $request->get('content');
         $comment->blog_id = $request->get('article_id');


         $isSaved = $comment->save();

         if ($isSaved) {
            DB::commit();
            return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
         } else {
            DB::rollBack();
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $this->authorize('update', Comments::class);

      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Comments::class);

      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Comments::class);

      $comments = Comment::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $comments ? 200 : 400);
   }
}
