<?php 
namespace App\GraphQL\Mutations;

use App\Tarif;
use GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class CreateTarifMutation extends Mutation{
    protected $attributes = [
        "name"=>"createTarif"
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
            "annee"=>['required'],
            "montant"=>['required'],
        ];
    }

    public function resolve($root, $args){
        return Tarif::create($args);
    }
}