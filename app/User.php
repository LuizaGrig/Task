<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    /**
     * @var mixed
     */
    private $role;

    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $email;
    /**
     * @var mixed
     */
    private $password;
    public $timestamps = false;
    public function tasks(){
        return $this->belongsToMany('App\Task', 'tasks_users');
    }
}

