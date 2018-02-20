<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'id',
        'label',
        'sale_rate',
        'purchase_rate',
        'img_path'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orderdetails()
    {
      return $this->hasMany('App\OrderDetail');
    }

    public function banknotes()
    {
        return $this->hasMany('App\Models\Banknote');
    }
}
