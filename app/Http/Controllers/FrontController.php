<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Row;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index()
   {
      $rows = Row::all();
      return view('front.index', compact('rows'));
   }
   public function post_details($id)
   {
      $blog = Blog::findOrFail($id);
      return view('front.details-new', compact('blog'));
   }
}
