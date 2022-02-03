<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\Blog;
use App\Models\Admin\Careerapply;
use App\Models\User\Userdetail;
use App\Models\User\Blogcomment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_editor',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function Blog()
    {
        return $this->hasMany(Blog::class);
    }
    public function Userdetail()
    {
        return $this->hasOne(Userdetail::class);
    }

    public function Careerapply()
    {
        return $this->hasMany(Careerapply::class);
    }
    public function Blogcomment()
    {
        return $this->hasMany(Blogcomment::class);
    }
}
