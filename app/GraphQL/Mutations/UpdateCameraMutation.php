<?php
namespace App\GraphQL\Mutations;

use GraphQL;
use App\Camera;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Mutation;

class UpdateCameraMutation extends Mutation
{
    protected $attributes = [
        'name'=>'updateCamera'
    ];

    public function type(): Type
    {
        return GraphQL::type('camera');
    }

    public function args(): array
    {
        return[
            'id'=>[
                'type'=>Type::int(),
                'description'=>'the coin camera',
                'rules'=>['required']
            ],
            'designation'=>[
                'type'=>Type::string(),
                'description'=>'the name of camera',
            ],
            'mdp'=>[
                'type'=>Type::string(),
                'description'=>'the password of camera',
            ],
            'code'=>[
                'type'=>Type::string(),
                'description'=>'the unique code of camera',
            ],
            'adresse'=>[
                'type'=>Type::string(),
                'description'=>'the location of camera',
            ],
        ];
    }

    public function resolve($root,$args){
        if (isset($args['mdp'])) {
            $args['mdp'] = Hash::make($args['mdp']);
        }
        Camera::find($args['id'])->update($args);
        return Camera::find($args['id'])->get()->first();
    }
}
