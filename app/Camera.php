<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $fillable = [
        'id', 'designation', 'mdp', 'code', 'adresse'
    ];

    public function contreventions(){
        return $this->hasMany('App\Contrevention');
    }

    public function souscriptions(){
        return $this->hasMany('App\Souscription');
    }
}
