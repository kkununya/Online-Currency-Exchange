<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BanknoteTransaction extends Model
{
    protected $fillable = [
        'id',
        'banknote_id',
        'amount',
        'order_detail_id',
        'created_at'
    ];

    protected $hidden = [
        'updated_at'
    ];

}