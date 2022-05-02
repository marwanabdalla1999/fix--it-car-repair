<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requests extends Model
{

    protected $table='get_requests';
    protected $fillable=['user_id','order_id','issue'];

}
