<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'customer_id',
        'receiver_id',
        'user_id',
        'payment_id',
        'selected_date',
        'selected_branch_id',
        'purpose_id',
        'total_price',
        'order_status_id',
        'pick_up_date_time',
        'pick_up_branch'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    // An Order is Owned by a customer.
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function receiver(){
        return $this->belongsTo('App\Models\Receiver');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function branch(){
        return $this->belongsTo('App\Models\Branch', 'selected_branch_id');
    }
    
    public function purpose(){
        return $this->belongsTo('App\Models\Purpose');
    }

    public function status(){
        return $this->belongsTo('App\Models\OrderStatus', 'order_status_id');
    }
}