<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'lotNumber',
    ];

    public function floor(){
        return $this->belongsTo('App\Floor');
    }

    public function zone(){
        return $this->belongsTo('App\Zone');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
