<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
   private $database;

   public function __construct()
   {
      $this->database = \App\Services\FirebaseService::connect();
   }
   public function createForm()
   {
      return view('cms.breaking.create');
   }
   public function create(Request $request)
   {
      $this->database
         ->getReference('breakingNews')
         ->remove();

      // تحديث جميع المستمعين على الـ newsList بالتحديث الجديد
      $newBreakingNews = [
         'title' => $request['title'],
         'href' => $request['href'],
         'creationTimestamp' => now()->timestamp, // إضافة الحقل وتعيينه بوقت الإنشاء
      ];
      $this->database
         ->getReference('breakingNews')
         ->push($newBreakingNews);

      return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
   }


   public function index()
   {
      return response()->json($this->database->getReference('data')->getValue());
   }

   public function edit(Request $request)
   {
      $this->database->getReference('breakingNews/' . $request['title'])
         ->update([
            'title/' => $request['title'],
            'href/' => $request['href']
         ]);

      return response()->json('blog has been edited');
   }
   public function delete(Request $request)
   {
      $this->database
         ->getReference('test/blogs/' . $request['title'])
         ->remove();

      return response()->json('blog has been deleted');
   }
}
