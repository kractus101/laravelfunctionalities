<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory = '/images/';
    use HasFactory;
    use SoftDeletes;
    protected $table = 'post';

    protected $dates = ['deleted_at'];
    protected $fillable = [

        'title',
        'body',
        'path'
    ];

    public function user()
    {

        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function photos() //return post's photo
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags()
    {

        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function scopeLatest($query)
    {

        return $query->orderBy('id', 'asc')->get();
    }

    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
}
