<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand_type_model extends Model
{
    protected $table='car_type_brand_model';
    protected $fillable=['type','brand','model'];
}
