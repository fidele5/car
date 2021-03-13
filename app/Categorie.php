<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    protected $fillable = [
        "nom", "id"
    ];


    public function vehicules(){
        return $this->hasMany('App\Vehicule');
    }

    public function tarif(){
        return $this->belongsTo('App\Tarif');
    }
}
