<?php
namespace App\GraphQL\Mutations;

use App\Taxe;
use GraphQL;
use Rebing\GraphQL\Support\Mutation;
;use GraphQL\Type\Definition\Type;

class UpdateTaxeMutation extends Mutation{
    protected $attributes = [
        "name"=>"updateTaxe"
    ];

    public function type(): Type
    {
        return GraphQL::type('taxe');
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
                "type" => Type::string(),
                "description" => "the description of the taxe",
            ],
            "tarif_id" =>[
                "type" => type::string(),
                "description" => "the corresponded tarif"
            ]
        ];
    }

    public function rules(array $args = []):array
    {
        return [
            "id"=>['required']
        ];
    }

    public function resolve($root, $args){
        Taxe::find($args['id'])->update($args);
        return Taxe::all();
    }
}