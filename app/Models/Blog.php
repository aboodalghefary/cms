<?php

namespace App\Models;

use App\Traits\Trans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   use Trans;

   use HasFactory;

   public function incrementViews()
   {
      $this->increment('views');
   }
   public function tags()
   {
      return $this->belongsToMany(Tag::class);
   }

   public function author()
   {
      return $this->belongsTo(Author::class);
   }
   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function comments()
   {
      return $this->hasMany(Comment::class);
   }
}
