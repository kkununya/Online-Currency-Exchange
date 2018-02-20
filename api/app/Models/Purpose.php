<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
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
      return $this->hasMany('App\Models\Order', 'purpose_id');
    }
}