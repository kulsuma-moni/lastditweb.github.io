<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\District;

class Division extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function District()
    {
        return $this->hasMany(District::class);
    }

}
