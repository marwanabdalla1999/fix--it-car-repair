<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand_type extends Model
{
    protected $table='car_type_brand';
    protected $fillable=['brand','type','photo'];
}
