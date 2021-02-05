<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
//
    protected $fillable = [
        'title', 'description', 'userID',
    ];


    public function users(){
        return $this->belongsToMany('App\User', 'tasks_users');
    }
}
