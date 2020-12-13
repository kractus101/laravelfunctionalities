<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {

        return $this->hasOne('App\Models\Post');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function roles()
    {
        //          to customize table name and column
        //        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id','role_id');
        // return $this->belongsToMany('App\Models\Role')->withPivot('country');
        return $this->belongsToMany('App\Models\Role');
    }
    public function photos() //return user's photo
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    } //accessors used to modify data while fetching from DB and displaying to user

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    } //mutator used to modify data while fetching from DB and displaying to user
}
