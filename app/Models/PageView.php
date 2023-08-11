<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
   protected $table = 'page_views'; // اسم الجدول في قاعدة البيانات

   protected $fillable = ['count']; // الحقول التي يمكن ملؤها في الجدول

   // لن تحتاج إلى الكثير من المنطق في هذا النموذج
   // فقط لإعلام Eloquent بأنه لا يجب تحديث الأوقات بشكل تلقائي
   public $timestamps = false;
}
