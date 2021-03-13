<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        "numero_chassis","image","numero_plaque", "file_document", "annee","categorie_id"
    ];

    public function acquisitions(){
        return $this->hasMany('App\Aquisition');
    }

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function paiements(){
        return $this->hasMany('App\Paiement');
    }

    public function contreventions(){
        return $this->hasMany('App\Contrevention');
    }
}
