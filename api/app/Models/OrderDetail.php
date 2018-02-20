<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'id',
        'label',
        'order_id',
        'currency_id',
        'sale_rate',
        'purchase_rate',
        'quantity',
        'price_thb'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\currency');
    }

    public function BanknoteTransactions(){
        return $this->hasMany('App\Models\BanknoteTransaction');
    }
}