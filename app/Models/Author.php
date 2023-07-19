<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
   use HasFactory;
   use Trans;
   use HasRoles;

   public function user()
   {
      return $this->morphOne(User::class, 'userable');
   }

   public function blogs()
   {
      return $this->hasMany(Blog::class);
   }
}
