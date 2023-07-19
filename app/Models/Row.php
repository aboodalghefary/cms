<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    public function categories()
{
    return $this->belongsToMany(Category::class, 'category_row', 'row_id', 'category_id');
}
}
