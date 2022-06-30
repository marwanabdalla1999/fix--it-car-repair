<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table='user_cars';
    protected $fillable=['id','email','phone','password','name'];
}
