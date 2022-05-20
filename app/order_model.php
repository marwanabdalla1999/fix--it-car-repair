<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_model extends Model
{

    protected $table='order';
    protected $fillable=['location_lat_lng','user_id','car_id','address','issue','payment_way','created_at','updated_at','state','tech_id','tech_location','card_used','payed_amount','amount_from_wallet'];

}
