<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Div;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
   public function index()
   {
      return view('cms.home');
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

      return view('cms.authors.show_profile_author', compact('author','roles'));
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
