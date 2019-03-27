<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //
    protected $fillable = [
        'name', 'description',
    ];

    public function tenant(){
        return $this->hasMany('App\Tenant');
    }
}
