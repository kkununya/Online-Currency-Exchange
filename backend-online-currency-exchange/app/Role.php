<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id', 'role_id', 'user_id'
        ];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
