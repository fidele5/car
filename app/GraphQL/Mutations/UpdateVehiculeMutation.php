<?php 
namespace App\GraphQL\Mutations;

use App\Vehicule;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateVehiculeMutation extends Mutation
{
    protected $attributes = [
        "name"=>"updateVehicule"
    ];

    public function type(): Type
    {
        return GraphQL::type('vehicule');
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

    public function rules(array $args = []):array
    {
        return [
            "id"=>['required']
        ];
    }

    public function resolve($root, $args){
        Vehicule::find($args['id'])->update($args);
        return Vehicule::all();
    }
    
}
