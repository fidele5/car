<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souscription extends Model
{
    protected $fillable = [
        "camera_id", 'poste_id', 'user_id'
    ];

    public function camera(){
        return $this->belongsTo('App\camera');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function poste(){
        return $this->belongsTo('App\Poste');
    }
}
