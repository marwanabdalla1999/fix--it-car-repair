<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_user_car extends Model
{
    protected $table='user_cars';
    protected $fillable=['user_id','type','brand','model','year','color'];
}
