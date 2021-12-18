<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Portfolio;

class Portfoliocate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
