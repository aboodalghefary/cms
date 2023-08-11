<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Div;
use App\Models\File;
use App\Models\PageView;
use App\Models\Tag;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
   public function index()
   {
      $visits = PageView::where('id', '1')->first();
      $newsCount = Blog::count();
      $filesCount = File::count();
      $tagsCount = Tag::count();

      $endDate = now()->endOfWeek(); // تاريخ نهاية الأسبوع الحالي
      $startDate = now()->subWeek()->startOfWeek(); // تاريخ بداية الأسبوع السابق

      $topTagsLastWeek = Tag::with(['dailyViews' => function ($query) use ($startDate, $endDate) {
         $query->whereBetween('week_date', [$startDate, $endDate])->orderBy('week_date');
      }])->orderByDesc('views')->take(5)->get();

      $data = [];
      foreach ($topTagsLastWeek as $tag) {
         $tagData = [
            'name' => $tag->name,
            'views' => []
         ];

         foreach ($tag->dailyViews as $dailyView) {
            $dayOfWeek = date('l', strtotime($dailyView->week_date));
            $tagData['views'][$dayOfWeek] = $dailyView->views;
         }

         $data[] = $tagData;
      }
      dd($data);

      return view('cms.home', compact('visits', 'newsCount', 'filesCount', 'tagsCount', 'top5tagsJson'));
   }
   public function front_control()
   {
      $divs = Div::all();
      $checked = Blog::first();
      $blogs_comment_enabled = $checked->blogs_comment_enabled;
      return view('cms.front_control', compact('divs', 'blogs_comment_enabled'));
   }

   public function show_profileAdmin($id)
   {
      $admin = Admin::findOrFail($id);
      $roles = Role::where('guard_name', 'admin')->get();
      return view('cms.authors.show_profile_admin', compact('admin', 'roles'));
   }
   public function show_profileAuthor($id)
   {
      $author = Author::findOrFail($id);
      $roles = Role::where('guard_name', 'author')->get();

      return view('cms.authors.show_profile_author', compact('author', 'roles'));
   }

   public function comments_enabled(Request $request)
   {
      try {
         $status = $request->get('comments_enabled');
         Blog::query()->update(['blogs_comment_enabled' => $status]);

         return response()->json(['icon' => 'success', 'title' => "تمت عملية التعديل بنجاح"], 200);
      } catch (\Exception $e) {
         return response()->json(['icon' => 'error', 'title' => "فشلت عملية التعديل"], 500);
      }
   }
}
