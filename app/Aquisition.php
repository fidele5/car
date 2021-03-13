<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aquisition extends Model
{
    protected $fillable = [
        'date_acquisition', 'type', 'vehicule_id', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function vehicule(){
        return $this->belongsTo('App\Vehicule');
    }
}
