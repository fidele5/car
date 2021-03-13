<?php
namespace App\GraphQl\Types;

use App\Paiement;
use GraphQL;
use Rebing\GraphQL\Support\Type AS GraphQLType;
use GraphQL\Type\Definition\Type;

class PaiementType extends GraphQLType
{
    protected $attributes = [
        "name"=>"Paiement",
        "description"=>"Paiements",
        "model"=>Paiement::class,
    ];

    public function fields():array
    {
        return [
            "id"=>[
                "type"=>Type::nonNull(Type::int()),
                "description"=>"id du paiement",
            ],
            "montant"=>[
                "type"=>Type::nonNull(Type::float()),
                "description"=>"montant payé",
            ],
            "date"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"date de paiement",
            ],
            "taxe"=>[
                "type"=>GraphQL::type('taxe'),
                "description"=>"La taxe payée"
            ],
            "vehicule"=>[
                "type"=>GraphQL::type('vehicule'),
                "description"=>"vehicule qui paie la taxe",
            ]
        ];
    }
}