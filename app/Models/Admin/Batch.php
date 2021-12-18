<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Course;
use App\Models\Admin\Student;

class Batch extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Course()
    {
        return $this->belongsTo(Course::class);
    }


    public function Student()
    {
        return $this->hasMany(Student::class);
    }


}
