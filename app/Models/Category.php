<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // Thêm dòng này

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'cate_id');
    }
}
