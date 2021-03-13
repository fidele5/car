<?php
namespace App\GraphQl\Types;

use App\Souscription;
use GraphQL;
use Rebing\GraphQL\Support\Type AS GraphQLType;
use GraphQL\Type\Definition\Type;

class SouscriptionType extends GraphQLType
{
    protected $attributes = [
        'name'=>'Souscription',
        'description'=>'Souscriptions',
        'model'=>Souscription::class,
    ];

    public function fields(): array
    {
        return [
            'id'=>[
                'type'=>Type::nonNull(Type::int()),
                'description'=>'the souscription id'
            ],
            'camera'=>[
                'type'=>GraphQL::type('camera'),
                'description'=>"the camera's belongs" 
            ],
            'poste'=>[
                'type'=>GraphQL::type('poste'),
                'description'=>'the poste whitch has souscibe to the camera'
            ],
            'user'=>[
                'type'=>GraphQL::type('user'),
                'description'=>'the associated user'
            ],
        ];
    }
}
