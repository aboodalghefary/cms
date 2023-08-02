<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Div;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $divs = Div::all();
      $checked = Blog::first();
      $blogs_comment_enabled = $checked->blogs_comment_enabled;
      return view('cms.home', compact('divs', 'blogs_comment_enabled'));
   }

   public function comments_enabled(Request $request)
   {
      // قم بتحديث قيمة الحقل blogs_comment_enabled في جدول blogs لتصبح 0 لجميع السجلات
      try {
         $status = $request->get('comments_enabled');
         Blog::query()->update(['blogs_comment_enabled' => $status]);

         // رسالة نجاح
         return response()->json(['icon' => 'success', 'title' => "تمت عملية التعديل بنجاح"], 200);
      } catch (\Exception $e) {
         // في حالة حدوث أي خطأ أثناء التحديث، راجع رسالة الفشل
         return response()->json(['icon' => 'error', 'title' => "فشلت عملية التعديل"], 500);
      }
   }
}
