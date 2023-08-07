<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Div;
use App\Models\Library;
use App\Models\Row;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
   public function index()
   {
      $rows = Row::all();
      $divs = Div::all();
      $library = Library::with('videos')->first();
      $album = Album::latest()->first();
      $images = Photo::latest()->take(2)->get();
      $news = Blog::where('status', 'posted')->latest()->take(13)->get();
      $categories = Category::whereNull('parent_id')->get();


      return view('front.index', compact(
         'rows',
         'library',
         'news',
         'categories',
         'album',
         'images',
         'divs',
      ));
   }
   public function search_For_BlogHas($text)
   {
      $blogs = Blog::where('status', 'posted')->where('content', 'LIKE', '%' . $text . '%')->get();

      $results = $blogs->map(function ($blog) {
         return [
            'title' => $blog->name,
            'url' => route('post_details', $blog->id)
         ];
      });

      return $results->toArray();
   }
   public function video_library()
   {
      $libraries = Library::all();
      $divs = Div::all();

      $categories = Category::whereNull('parent_id')->get();

      return view('front.video-library', compact('libraries', 'categories', 'divs'));
   }
   public function image_albums()
   {
      $albums = Album::all();
      $categories = Category::whereNull('parent_id')->get();
      $divs = Div::all();

      return view('front.album-image', compact('albums', 'categories', 'divs'));
   }
   public function category($id)
   {
      $categories = Category::whereNull('parent_id')->get();
      $category = Category::findOrFail($id);
      $divs = Div::all();

      $blogs = $category->blogs;

      $subCategories = $category->subCategories;
      $subCategoryBlogs = [];

      foreach ($subCategories as $subCategory) {
         $subCategoryBlogs = array_merge($subCategoryBlogs, $subCategory->blogs->toArray());
      }

      $allBlogs = array_unique(array_merge($blogs->toArray(), $subCategoryBlogs), SORT_REGULAR);

      usort($allBlogs, function ($a, $b) {
         return strtotime($b['created_at']) - strtotime($a['created_at']);
      });

      return view('front.category-news', compact('allBlogs', 'category', 'categories', 'divs'));
   }
   public function contactIndex()
   {
      $categories = Category::whereNull('parent_id')->get();
      $divs = Div::all();

      return view('front.contact', compact('categories', 'divs'));
   }
   public function contact_store(Request $request)
   {
      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
         'name' => 'required|string|min:3',
         'content' => 'required|string|min:3',
         'email' => 'required|string|min:3',
      ], [
         'title.required' => 'ادخل الرسالة ',
         'title.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      if (!$validator->fails()) {
         $contact = new AboutUs();
         $contact->title = $request->get('title');
         $contact->name = $request->get('name');
         $contact->content = $request->get('content');
         $contact->email = $request->get('email');
         $isSaved = $contact->save();

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
   public function post_details($id, $slug = null)
   {
      $blog = Blog::findOrFail($id);
      $categories = Category::whereNull('parent_id')->get();
      $blogs_most_views  = Blog::where('status', 'posted')->orderBy('views', 'desc')->limit(5)->get();
      $divs = Div::all();
      return view('front.details-new', compact('blog', 'categories',  'blogs_most_views', 'divs'));
   }
   public function library_details($id)
   {
      $divs = Div::all();

      $library = Library::findOrFail($id);
      $libraries_most_views  = Library::orderBy('views', 'desc')->limit(10)->get();
      $categories = Category::whereNull('parent_id')->get();

      return view('front.video-playlist', compact('library', 'libraries_most_views', 'categories', 'divs'));
   }
   public function get_last_news_ajax($id)
   {
      $category = Category::findOrFail($id);

      $blogs = $category->blogs;

      $subCategories = $category->subCategories;
      $subCategoryBlogs = [];

      foreach ($subCategories as $subCategory) {
         $subCategoryBlogs = array_merge($subCategoryBlogs, $subCategory->blogs->toArray());
      }

      $allBlogs = array_unique(array_merge($blogs->toArray(), $subCategoryBlogs), SORT_REGULAR);

      usort($allBlogs, function ($a, $b) {
         return strtotime($b['created_at']) - strtotime($a['created_at']);
      });
      $firstFourBlogs = array_slice($allBlogs, 0, 4);
      $posts = $firstFourBlogs;
      return response()->json(['posts' => $posts]);
   }
   public function get_last_news_ajax_by_name($name)
   {
      $category = Category::where('name', $name)->first();

      $blogs = $category->blogs;

      $subCategories = $category->subCategories;
      $subCategoryBlogs = [];

      foreach ($subCategories as $subCategory) {
         $subCategoryBlogs = array_merge($subCategoryBlogs, $subCategory->blogs->toArray());
      }

      $allBlogs = array_unique(array_merge($blogs->toArray(), $subCategoryBlogs), SORT_REGULAR);

      usort($allBlogs, function ($a, $b) {
         return strtotime($b['created_at']) - strtotime($a['created_at']);
      });
      $firstFourBlogs = array_slice($allBlogs, 0, 4);
      $posts = $firstFourBlogs;
      return response()->json(['posts' => $posts]);
   }
   public function album_details($id)
   {
      $album = Album::findOrFail($id);
      $categories = Category::whereNull('parent_id')->get();
      $divs = Div::all();

      return view('front.images', compact('album', 'categories', 'divs'));
   }
}
