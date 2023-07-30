<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Library;
use App\Models\Row;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
   public function index()
   {
      $rows = Row::all();
      $library = Library::with('videos')->first();
      $album = Album::latest()->first();
      $images = Photo::latest()->take(2)->get();
      $news = Blog::latest()->take(13)->get();
      $categories = Category::whereNull('parent_id')->get();
      return view('front.index', compact(
         'rows',
         'library',
         'news',
         'categories',
         'album',
         'images'
      ));
   }
   public function video_library()
   {
      $libraries = Library::all();
      $categories = Category::whereNull('parent_id')->get();

      return view('front.video-library', compact('libraries', 'categories'));
   }
   public function image_albums()
   {
      $albums = Album::all();
      $categories = Category::whereNull('parent_id')->get();

      return view('front.album-image', compact('albums', 'categories'));
   }
   public function category($id)
   {
      $category = Category::findOrFail($id);
      $categories = Category::whereNull('parent_id')->get();

      return view('front.category-news', compact('category', 'categories'));
   }
   public function contactIndex()
   {
      $categories = Category::whereNull('parent_id')->get();

      return view('front.contact', 'categories');
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
   public function post_details($id)
   {
      $blog = Blog::findOrFail($id);
      $categories = Category::whereNull('parent_id')->get();

      return view('front.details-new', compact('blog', 'categories'));
   }
   public function library_details($id)
   {
      $library = Library::findOrFail($id);
      $libraries_most_views  = Library::orderBy('views', 'desc')->limit(10)->get();
      $categories = Category::whereNull('parent_id')->get();

      return view('front.video-playlist', compact('library', 'libraries_most_views', 'categories'));
   }
   public function get_last_news_ajax($id)
   {
      $get_last_news_ajax  = Category::findOrFail($id);
      $posts = Blog::where('category_id', $id)->latest()->take(4)->get();
      return response()->json(['get_last_news_ajax' => $get_last_news_ajax, 'posts' => $posts]);
   }
   public function album_details($id)
   {
      $album = Album::findOrFail($id);
      $categories = Category::whereNull('parent_id')->get();

      return view('front.images', compact('album', 'categories'));
   }
}
