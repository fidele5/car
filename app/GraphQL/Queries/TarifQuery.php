<?php 
namespace App\GraphQL\Queries;

use GraphQL;
use App\Tarif;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class TarifQuery extends Query{
    protected $attributes = [
        "name"=>"tarifQuery"
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('tarif'));
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

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $closure){

        if (isset($args['id'])) {
            return Tarif::find($args['id'])->get();
        }

        return Tarif::all();
    }
}