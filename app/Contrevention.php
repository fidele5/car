<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrevention extends Model 
{
    protected $fillable = [
        "capture", "taxe_id", "vehicule_id", "camera_id"
    ];

    public function taxe(){
        return $this->belongsTo('App\Taxe');
    }

    public function vehicule(){
        return $this->belongsTo('App\Vehicule');
    }

    public function camera(){
        return $this->belongsTo('App\Camera');
    }
}
