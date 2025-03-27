<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // Thêm dòng này

    protected $fillable = ['title', 'description'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }
}
