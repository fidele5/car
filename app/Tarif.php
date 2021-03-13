<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        "id", "annee", "montant", "taxe_id", "categorie_id"
    ];

    public function taxes(){
        return $this->hasMany('App\Taxe');
    }

    public function categories(){
        return $this->hasMany('App\Categorie');
    }
}
