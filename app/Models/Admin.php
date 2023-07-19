<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
   use HasFactory;
   use Trans;
   use HasRoles;
   public function user()
   {
      return $this->morphOne(User::class, 'userable');
   }
}
