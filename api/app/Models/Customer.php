<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'id_type',
        'card_id',
        'nation',
        'name_title',
        'first_name',
        'last_name',
        'telephone_no',
        'email',
        'address',
        'district',
        'amphoe',
        'province',
        'zipcode'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orders()
    {
      return $this->hasMany('App\Order');
    }
}