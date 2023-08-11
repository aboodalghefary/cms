<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;

class IncreaseTagsViews
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
      $post = Blog::findOrFail($postId);
      $tags = $post->tags;

      if ($tags) {
         foreach ($tags as $key => $tag) {
            $tag->incrementTagViews();
         }
      }

      return $next($request);
   }
}
