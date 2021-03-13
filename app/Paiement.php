<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        "id", "date", "montant", "taxe_id", "vehicule_id"
    ];

    public function taxe(){
        return $this->belongsTo("App\Taxe");
    }

    public function vehicule(){
        return $this->belongsTo("App\Vehicule");
    }
}
