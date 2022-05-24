<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactions_history extends Model
{

    protected $table='transactions_history';
    protected $fillable=['user_id','order_name','amount'];

}
