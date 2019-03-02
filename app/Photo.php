<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'file',
        'from'
    ];

    public function post(){
        return $this->hasOne('App\Post');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
