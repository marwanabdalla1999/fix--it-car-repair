<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider_data extends Model
{
    protected $table='Technicans';
    protected $fillable=['name','phone','token','updated_at','created_at','photo','provider_id','specialized_in'];
}
