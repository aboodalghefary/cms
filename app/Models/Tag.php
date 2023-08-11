<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   use HasFactory;
   protected $fillable = ['name'];

   public function dailyViews()
   {
      return $this->hasMany(DailyView::class);
   }

   public function incrementTagViews()
   {
      $this->increment('views');

      $today = now();
      $weekStart = $today->copy()->startOfWeek();
      $weekDate = $weekStart->format('Y-m-d');
      $dayOfWeek = $today->dayOfWeek;

      $dailyView = $this->dailyViews()->where('week_date', $weekDate)->where('day_of_week', $dayOfWeek)->first();

      if ($dailyView) {
         $dailyView->increment('views');
      } else {
         $this->dailyViews()->create([
            'week_date' => $weekDate,
            'day_of_week' => $dayOfWeek,
            'views' => 1,
         ]);
      }
   }

   public function blogs()
   {
      return $this->belongsToMany(Blog::class);
   }
}
