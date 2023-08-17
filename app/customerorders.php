<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerorders extends Model
{
    protected $table='customer_orders';
    protected $primaryKey='id';
    protected $fillable=['users_id',
        'users_email','item_name','price','quantity',
        'order_status','payment_method','grand_total'];
}
