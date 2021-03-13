<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = [
        "designation", "adresse", "code"
    ];

    public function souscriptions(){
        return $this->hasMany('App\Souscription');
    }
}
