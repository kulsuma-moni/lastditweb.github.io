<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Blog;
use App\Models\User;

class Blogcomment extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
