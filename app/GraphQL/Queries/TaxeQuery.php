<?php
namespace App\GraphQL\Queries;

use App\Taxe;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class TaxeQuery extends Query{
    protected $attributes = [
        "name"=>"taxeQuery",
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('taxe'));
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
        ];
    }


    public function resolve($root, $args){
        if (isset($args['id'])) {
            return Taxe::find($args['id'])->get();
        }

        if (isset($args['type'])) {
            return Taxe::where('type', $args['type'])->get();
        }

        return Taxe::all();
    }
}