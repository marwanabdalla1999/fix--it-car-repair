<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_model extends Model
{
    protected $table='user_cars';
    protected $fillable=['id','email','phone','password','name'];
}
