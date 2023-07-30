<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
   use HasFactory;
   use Trans;
   protected $fillable = ['name', 'image', 'parent_id'];

   public function blogs()
   {
      return $this->hasMany(Blog::class);
   }
   
   public function parentCategory()
   {
      return $this->belongsTo(Category::class, 'parent_id');
   }

   public function subCategories()
   {
      return $this->hasMany(Category::class, 'parent_id');
   }

   public function rows()
   {
      return $this->belongsToMany(Row::class, 'category_row', 'category_id', 'row_id');
   }
}
