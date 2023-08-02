<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;

class IncreaseBlogsViews
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
   public function handle(Request $request, Closure $next)
   {
      $postId = $request->route('id');
      $post = Blog::find($postId);

      if ($post) {
         $post->incrementViews();
      }

      return $next($request);
   }
}
