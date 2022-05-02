<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tech_offer extends Model
{
    protected $table='technican_offer';
    protected $fillable=['user_id','technican_id','order_id','amount','time','distance'];
}
