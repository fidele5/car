<?php
namespace App\GraphQl\Types;

use App\Contrevention;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ContreventionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Contrevention',
        'description' => 'Contreventions',
        'model' => Contrevention::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'the identifyer of the contrevention',
            ],
            'capture' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'the cars screenshot',
            ],
            'taxe' => [
                'type' => GraphQL::type('taxe'),
                'description' => 'the taxe not paid',
            ],
            'vehicule' => [
                'type' => GraphQL::type('vehicule'),
                'description' => 'the vehicule captured',
            ],
            'camera' => [
                'type' => GraphQL::type('camera'),
                'description'=>'the camera whithc captured shoot'
            ],
        ];
    }
}
