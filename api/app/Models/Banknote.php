<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banknote extends Model
{
    protected $fillable = [
        'id',
        'currency_id',
        'type',
        'quantity'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }
}