<?php
namespace App\GraphQL\Types;

use App\Tarif;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type AS GraphQLType;

class TarifType extends GraphQlType
{
    protected $attributes = [
        "name"=>"Tarif",
        "description"=>"Tarifs",
        "model"=>Tarif::class
    ];

    public function fields(): array
    {
        return [
            "id"=>[
                "type"=>Type::nonNull(Type::int()),
                "description"=>"Identifyer of tarif"
            ],
            "annee"=>[
                "type"=>Type::nonNull(Type::int()),
                "description"=>"The created year",
            ],
            "montant"=>[
                "type"=>Type::nonNull(Type::float()),
                "description"=>"The amount coresponded"
            ],
            'taxes'=>[
                'type'=>Type::listOf(GraphQL::type('taxe')),
                'description'=>'the taxes in tarif'
            ],
        ];
    }

}

