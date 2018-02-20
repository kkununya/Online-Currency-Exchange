<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'id',
        'name',
        'address',
        'tel',
        'workingTime'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orders()
    {
      return $this->hasMany('App\Models\Order', 'selected_branch_id');
    }
}