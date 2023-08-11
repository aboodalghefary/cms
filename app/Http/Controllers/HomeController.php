<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Blog;
use App\Models\DailyView;
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

      $lastWeekTags = DailyView::whereBetween('week_date', [$startDate, $endDate])
         ->orderBy('tag_id')
         ->get();

      $tagData = [];

      foreach ($lastWeekTags as $dailyView) {
         $tagId = $dailyView->tag_id;
         $tag = Tag::findOrFail($tagId);
         if (!isset($tagData[$tagId])) {
            $tagData[$tagId] = [
               'tag_id' => $tagId,
               'name' => $tag->name,
               'views' => [],
            ];
         }

         $weekDays = [0, 1, 2, 3, 4, 5, 6];
         foreach ($weekDays as $key => $dayOfWeek) {
            $todayViews = $dailyView->where('tag_id', $tagId)->where('day_of_week', $dayOfWeek)->first();
            $dayName = date('l', strtotime('Sunday +' . $dayOfWeek . ' days'));
            $tagData[$tagId]['views'][$dayName] = $todayViews->views ?? 0;
         }
      }

      // ترتيب المصفوفة حسب مجموع المشاهدات على مدار الأسبوع
      usort($tagData, function ($a, $b) {
         $aViewsTotal = array_sum($a['views']);
         $bViewsTotal = array_sum($b['views']);
         return $bViewsTotal - $aViewsTotal;
      });

      // اختيار أعلى 5 وسوم
      $top5Tags = array_slice($tagData, 0, 5);
      $top5tagsJson = json_encode($top5Tags);
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
