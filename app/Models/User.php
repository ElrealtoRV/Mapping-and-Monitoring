<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyLast_name;
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [

        'first_name', 'middle_name', 'last_name','age','bdate','contnum', 'idnum','office', 'email','college','role', 'password','status','email_verified_at','first_name_verified_at','last_name_verified_at',
    ];


    public function requests()
    {
        return $this->hasMany(RequestLists::class); // Assuming 'user_id' is the foreign key
    }
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function office()
    {
        return $this->belongsTo(OfficeLists::class,'office');
    }
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isHead()
    {
        return $this->role === 'head';
    }
    public function approveLists()
    {
        return $this->hasMany(ApproveList::class);
    }
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
        'first_name_verified_at' => 'datetime',
        'last_name_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}


