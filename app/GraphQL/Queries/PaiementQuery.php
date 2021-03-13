<?php 
namespace App\GraphQL\Queries;

use App\Paiement;
use Closure;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class PaiementQuery extends Query
{
    protected $attributes = [
        "name"=>"paiementQuery"
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('paiement'));
    }

    public function args(): array
    {
        return [
            "id"=>[
                "type"=>Type::int(),
                "description"=>"id du paiement",
            ],
            "montant"=>[
                "type"=>Type::float(),
                "description"=>"montant payé",
            ],
            "date"=>[
                "type"=>Type::string(),
                "description"=>"date de paiement",
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $closure){

        if (isset($args['id'])) {
            return Paiement::find($args['id'])->get();
        }
        return Paiement::all();
    }
}