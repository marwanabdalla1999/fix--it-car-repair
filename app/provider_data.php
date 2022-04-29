<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider_data extends Model
{
    protected $table='Technicans';
    protected $fillable=['name','phone','token','created_at','photo'];
}
