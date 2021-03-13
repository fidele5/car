<?php
namespace App\GraphQL\Mutations;

use App\Aquisition;
use App\Vehicule;

use GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class CreateVehiculeMutation extends Mutation
{
    protected $attribute = [
        "name"=>"createVehicule"
    ];

    public function type(): Type
    {
        return GraphQL::type("vehicule");
    }

    public function args(): array
    {
        return [
            "id"=>['name'=>"id", "type"=>Type::int()],
            "numero_plaque"=>['name'=>"numero_plaque", "type"=>Type::string()],
            "image"=>['name'=>"image", "type"=>Type::string()],
            "num_chassis"=>['name'=>"num_chassis", "type"=>Type::string()],
            "file_document"=>['name'=>"file_document", "type"=>Type::string()],
            "annee"=>['name'=>"annee", "type"=>Type::int()],
            "categorie_id"=>["name"=>"categorie_id", "type"=>Type::int()]
        ];
    }

    public function resolve($root, $args){
        $vehicule =  Vehicule::create($args); 
        return $vehicule;
    }
}
