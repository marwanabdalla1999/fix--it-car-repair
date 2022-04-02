<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table='user';
    protected $fillable=['name','phone','token','created_at','updated_at','otp','verifyed'];
}
