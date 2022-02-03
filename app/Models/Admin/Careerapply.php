<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Career;
use App\Models\User;

class Careerapply extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Career()
    {
        return $this->belongsTo(Career::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
