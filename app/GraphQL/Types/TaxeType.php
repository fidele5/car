<?php 
namespace App\GraphQl\Types;

use App\Taxe;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type AS GraphQLType;

class TaxeType extends GraphQLType
{
    protected $attributes = [
        "name"=>"Taxe",
        "description"=>"The taxe to be paid",
        "model"=>Taxe::class
    ];


    public function fields(): array
    {
        return [
            "id"=>[
                "type"=>Type::nonNull(Type::int()),
                "description"=>"The identifyer of a taxe"
            ],
            "type"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the type of taxe"
            ],
            "designation"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the description of the taxe"
            ],
            'tarif'=>[
                "type"=>GraphQL::type('tarif'),
                "description"=>"The tarif's correspondance"
            ]
        ];
    }
}
