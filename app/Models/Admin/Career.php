<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Careerapply;

class Career extends Model
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

    public function Careerapply()
    {
        return $this->hasMany(Careerapply::class);
    }
}
