<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Division;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Division()
    {
        return $this->belongsTo(Division::class);
    }

}
