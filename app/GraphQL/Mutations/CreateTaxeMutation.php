<?php 
namespace App\GraphQL\Mutations;

use App\Taxe;
use GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class CreateTaxeMutation extends Mutation{
    protected $attributes = [
        "name"=>"createTaxe"
    ];

    public function type(): Type
    {
        return GraphQl::type('taxe');
    }

    public function args(): array
    {
        return [
            "id" => [
                "type" => Type::int(),
                "description" => "The identifyer of a taxe",
            ],
            "type" => [
                "type" => Type::string(),
                "description" => "the type of taxe",
            ],
            "designation" => [
                "type" =>Type::string(),
                "description" => "the description of the taxe",
            ],
            'tarif_id' =>[
                "type"=>Type::int(),
                "description" => "His correspondance tarif"
            ]
        ];
    }

    public function rules(array $args = []):array
    {
        return [
            "type"=>["required"],
            "designation"=>["required"],
            "tarif_id" => ["required"] 
        ];
    }

    public function resolve($root, $args){
        return Taxe::create($args);
    }
}