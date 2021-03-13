<?php
namespace App\GraphQL\Queries;

use App\Contrevention;
use GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;

class ContreventionQuery extends Query
{
    protected $attributes = [
        'name'=>'contreventionQuery'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('contrevention'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'the identifyer of the contrevention',
            ],
            'capture' => [
                'type' => Type::string(),
                'description' => 'the cars screenshot',
            ],
            'taxe_id' => [
                'type' => Type::int(),
                'description' => 'the associated taxe',
            ],
            'vehicule_id' => [
                'type' => Type::int(),
                'description' => 'the associated car',
            ],
            'camera_id' => [
                'type' => Type::int(),
                'description' => 'the associated camera',
            ]
        ];
    }

    public function resolve($root, $args){
        return Contrevention::all();
    }
}