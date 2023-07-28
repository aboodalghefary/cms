<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Library;
use App\Models\Row;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index()
   {
      $rows = Row::all();
      $library = Library::with('videos')->first();
      return view('front.index', compact('rows', 'library'));
   }
   public function contactIndex()
   {
      return view('front.contact');
   }
   public function post_details($id)
   {
      $blog = Blog::findOrFail($id);
      return view('front.details-new', compact('blog'));
   }
}
