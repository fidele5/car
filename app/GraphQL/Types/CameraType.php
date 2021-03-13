<?php
namespace App\GraphQl\Types;

use App\Camera;
use GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class CameraType extends GraphQLType{
    protected $attributes = [
        'name'=>'Camera',
        'description'=>'Cameras',
        'model'=>Camera::class,
    ];

    public function fields(): array
    {
        return [
            'id'=>[
                'type'=>Type::nonNull(Type::int()),
                'description'=>'the coin camera',
            ],
            'designation'=>[
                'type'=>Type::nonNull(Type::string()),
                'description'=>'the name of camera',
            ],
            'mdp'=>[
                'type'=>Type::nonNull(Type::string()),
                'description'=>'the password of camera',
            ],
            'code'=>[
                'type'=>Type::nonNull(Type::string()),
                'description'=>'the unique code of camera',
            ],
            'adresse'=>[
                'type'=>Type::nonNull(Type::string()),
                'description'=>'the location of camera',
            ],
            'contreventions'=>[
                'type'=>Type::listOf(GraphQL::type('contrevention')),
                'description'=>'the owner contreventions'
            ],
            'souscriptions'=>[
                'type'=>Type::listOf(GraphQL::type('souscription')),
                'description'=>'the owner contreventions'
            ],
        ];
    }
}
