<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'username', 'email', 'password', 'phone', 'address', 'name', 'id'
=======
        'name', 'username', 'password','email','phone'
>>>>>>> master
    ];


    /**
     *Laravel acl package
     * 
     * 
     * 
     */
    use HasRoles;
    protected $guard_name = 'web';


    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======
    public function username()
    {
        return 'username';
    }
>>>>>>> master

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
