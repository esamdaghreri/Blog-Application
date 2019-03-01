<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'           => true,              
            ]
        ];
    }




    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
