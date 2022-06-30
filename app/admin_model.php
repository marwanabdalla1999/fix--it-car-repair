<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_model extends Model
{
    protected $table='admin';
    protected $fillable=['id','email','phone','password','name'];
}
