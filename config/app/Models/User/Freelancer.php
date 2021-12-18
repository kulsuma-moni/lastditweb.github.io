<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Division;
use App\Models\Admin\District;

class Freelancer extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Division()
    {
        return $this->belongsTo(Division::class);
    }
    public function District()
    {
        return $this->belongsTo(District::class);
    }
}
