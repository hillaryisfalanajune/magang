<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $guarded = ['id'];//tidak boleh manual diisi

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    /*protected $fillable = [
        'name',
        'email',
        'password',
        'gambar'
    ]; */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relasi tabel users ke posts 1 ke N
    // public function posts(){
    //     return $this->hasMany(Post::class);
    // }

}