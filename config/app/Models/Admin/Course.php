<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Batch;
use App\Models\Admin\Student;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Batch()
    {
        return $this->hasMany(Batch::class);
    }
    public function Student()
    {
        return $this->hasMany(Student::class);
    }
}
