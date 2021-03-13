<?php
namespace App\GraphQl\Types;

use GraphQL;
use App\Aquisition;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AquisitionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Aquisition',
        'description' => 'Aquisitions',
        'model' => Aquisition::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'date_acquisition' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The aquiert date',
            ],
            'type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The type',
            ],
            'vehicule' => [
                'type' => GraphQL::type('vehicule'),
                'description' => 'Identifier of a car',
            ],
            'user' => [
                'type' => GraphQl::type('user'),
                'description' => 'Identifyer of the owner',
                'always'=>['login, email, id']
            ],
        ];
    }
}
