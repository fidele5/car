<?php 
namespace App\GraphQL\Mutations;

use App\Contrevention;
use GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class UpdateContreventionMutation extends Mutation
{
    protected $attributes = [
        'name'=>'updateContrevention'
    ];

    public function type(): Type
    {
        return GraphQL::type('contrevention');
    }

    public function args(): array
    {
        return[    
            'id' => [
                'type' => Type::int(),
                'description' => 'the identifyer of the contrevention',
                'rules'=>['required']
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
            ],
        ];
    }

    public function resolve($root, $args){
        Contrevention::find($args['id'])->update($args);
        return Contrevention::find($args['id'])->get();
    }
}