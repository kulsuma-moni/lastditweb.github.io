<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Blogcate;
use App\Models\User\Blogcomment;
use App\Models\User;


class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Blogcate()
    {
        return $this->belongsToMany(Blogcate::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Blogcomment()
    {
        return $this->hasMany(Blogcomment::class);
    }
    
    
    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('single.blog',$this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('single.blog',$this->slug));
    }

    public function linkedin()
    {
        return url(" http://www.linkedin.com/shareArticle?mini=true&url=" . route('single.blog',$this->slug));
    }
    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('single.blog',$this->slug));
    }
}
