<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Student;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
