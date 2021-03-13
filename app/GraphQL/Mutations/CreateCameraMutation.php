<?php 
namespace App\GraphQL\Mutations;

use App\Camera;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateCameraMutation extends Mutation
{
    protected $attributes = [
        'name'=>'createCamera'
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
            ],
            'designation'=>[
                'type'=>Type::string(),
                'description'=>'the name of camera',
                'rules'=>['required']
            ],
            'mdp'=>[
                'type'=>Type::string(),
                'description'=>'the password of camera',
                'rules'=>['required'],
            ],
            'code'=>[
                'type'=>Type::string(),
                'description'=>'the unique code of camera',
                'rules'=>['required'],
            ],
            'adresse'=>[
                'type'=>Type::string(),
                'description'=>'the location of camera',
                'rules'=>['required']
            ],
        ];
    }

    public function resolve($root,$args){
        return Camera::create($args);
    }
}
