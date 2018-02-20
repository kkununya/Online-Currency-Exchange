<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';
    protected $fillable = [
        'id',
        'th',
        'en'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orders()
    {
      return $this->hasMany('App\Models\Order');
    }
}