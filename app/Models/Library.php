<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
   use HasFactory;

   public function videos()
   {
      return $this->hasMany(Video::class);
   }

   public function incrementViews()
   {
      $this->increment('views');
   }
}
