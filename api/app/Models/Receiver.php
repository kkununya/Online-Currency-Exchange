<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
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
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}