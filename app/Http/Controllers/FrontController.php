<?php

namespace App\Http\Controllers;

use App\Models\Row;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index()
   {
      $rows = Row::all();
      return view('front.index', compact('rows'));
   }
}
