<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyView extends Model
{
   use HasFactory;

   protected $fillable = ['week_date', 'day_of_week', 'views'];

   public function tags()
   {
      return $this->hasMany(Tag::class);
   }
}
