<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table='users';
    protected $guarded = [];
    protected $primaryKey = 'user_id';

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
