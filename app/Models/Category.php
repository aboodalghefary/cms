<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   use HasFactory;
   use Trans;

   public function blogs()
   {
      return $this->hasMany(Blog::class);
   }
   public function sub_categories()
   {
      return $this->hasMany(SubCategory::class);
   }
   public function rows()
   {
      return $this->belongsToMany(Row::class, 'category_row', 'category_id', 'row_id');
   }
}
