<?php

namespace App\Http\Controllers;

use App\Models\Div;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $divs = Div::all();
      return view('cms.home', compact('divs'));
   }
}
