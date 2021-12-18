<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Portfoliocate;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Portfoliocate()
    {
        return $this->belongsTo(Portfoliocate::class);
    }
}
