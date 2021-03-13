<?php
namespace App\GraphQL\Mutations;

use App\Paiement;
use Carbon\Carbon;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreatePaiementMutation extends Mutation{
    protected $attributes = [
        "name"=>"createPaiement"
    ];

    public function type(): Type
    {
        return GraphQL::type('paiement');
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
                "rules"=>['required']
            ],
            "date"=>[
                "type"=>Type::string(),
                "description"=>"date de paiement",
                "rules"=>['required']
            ],
            "taxe_id"=>[
                "type"=>Type::int(),
                "description"=>"taxe",
                "rules"=>['required']
            ],
            "vehicule_id"=>[
                "type"=>Type::int(),
                "description"=>"vehicule",
                "rules"=>['required']
            ]
        ];
    }

    public function resolve($root, $args){
        $args['date'] = Carbon::now()->toDateTimeString();
        return Paiement::create($args);
    }
}