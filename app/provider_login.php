<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider_login extends Model
{
    protected $table='tech_login';
    protected $fillable=['password','token','username'];
}
