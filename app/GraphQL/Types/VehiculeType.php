<?php
namespace App\GraphQl\Types;

use GraphQL;
use App\Vehicule;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class VehiculeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Vehicule',
        'description' => 'Vehicules',
        'model' => Vehicule::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'numero_plaque' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The plaque number',
            ],
            'image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The image',
            ],
            'num_chassis' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The chassis number',
            ],
            'file_document' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The document',
            ],
            'annee' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The creation year',
            ],
            'categorie' => [
                'type' => GraphQL::type('categorie'),
                'description' => 'The category of car',
            ],
            'paiements' => [
                'type' => Type::listOf(GraphQL::type('paiement')),
                'description'=>'the paids taxtes',
            ],
            'contreventions' => [
                'type' => Type::listOf(GraphQL::type('contrevention')),
                'description' => 'the contreventions occured',
            ],
        ];
    }
}
