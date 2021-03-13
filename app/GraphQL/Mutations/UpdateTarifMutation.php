<?php 
namespace App\GraphQL\Mutations;

use GraphQL;
use App\Tarif;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class UpdateTarifMutation extends Mutation{
    protected $attributes = [
        "name"=>"updateTarif"
    ];

    public function type(): Type
    {
        return GraphQL::type('tarif');
    }

    public function args(): array
    {
        return [
             "id"=>[
                "type"=>Type::int(),
                "description"=>"Identifyer of tarif"
            ],
            "annee"=>[
                "type"=>Type::int(),
                "description"=>"The created year",
            ],
            "montant"=>[
                "type"=>Type::float(),
                "description"=>"The amount coresponded"
            ],
        ];
    }

    public function rules(array $args = []):array
    {
        return [
            "id"=>["required"]
        ];
    }

    public function resolve($root, $args){
        Tarif::find($args['id'])->update($args);
        return Tarif::all();
    }
}