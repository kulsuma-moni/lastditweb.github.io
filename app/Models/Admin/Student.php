<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Course;
use App\Models\Admin\Payment;
use App\Models\Admin\Batch;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
    public function Payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function Batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
