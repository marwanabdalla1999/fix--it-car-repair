<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_cards extends Model
{

    protected $table='user_cards';
    protected $fillable=['user_id','token','mask_pan','card_id'];

}
