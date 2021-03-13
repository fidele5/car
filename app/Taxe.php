<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    protected $fillable = [
        "id", "type", "designation"
    ];

    public function tarif(){
        return $this->belongsTo('App\Tarif');
    }

    public function paiements(){
        return $this->hasMany('App\Paiement');
    }

    public function contreventions(){
        return $this->hasMany('App\Contrevention');
    }
}
