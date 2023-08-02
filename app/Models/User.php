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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Role',
        'ViewPassowrd'

    ];

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
    public function Role()
    {
        return $this->hasMany(\App\Models\Role\RoleMaster::class,'Role','id');
    }

    public function RoleDetails()
    {
        return $this->belongsTo(\App\Models\Role\RoleMaster::class,'Role','id');
    }

    public function empOffData(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'id','user_id');
    }

    public function empOffDetail(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'id','user_id')->with('OfficeMasterParent');
    }
}
