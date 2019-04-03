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
        return $this->belongsTo('App\Floor','floorID','id');
    }

    public function zone(){
        return $this->belongsTo('App\Zone','zoneID','id');
    }

    public function category(){
        return $this->belongsTo('App\Category','categoryID','id');
    }
}
