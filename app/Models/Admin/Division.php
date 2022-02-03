<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\District;
use App\Models\Admin\Freelancer;
use App\Models\Admin\Career;
use App\Models\Admin\Entrepreneur;

class Division extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function District()
    {
        return $this->hasMany(District::class);
    }


    public function Freelancer()
    {
        return $this->hasMany(Freelancer::class);
    }
    public function Entrepreneur()
    {
        return $this->hasMany(Entrepreneur::class);
    }
    public function Career()
    {
        return $this->hasMany(Career::class);
    }

}
