<?php
namespace App\GraphQL\Queries;

use GraphQL;
use App\Camera;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;

class CameraQuery extends Query
{
    protected $attributes = [
        "name"=>"cameraQuery"
    ];


    public function type(): Type
    {
        return Type::listOf(GraphQL::type('camera'));
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
            ],
            'mdp'=>[
                'type'=>Type::string(),
                'description'=>'the password of the camera',
            ],
            'code'=>[
                'type'=>Type::string(),
                'description'=>'the unique code of camera',
            ],
            'adresse'=>[
                'type'=>Type::string(),
                'description'=>'the location of camera',
            ]
        ];
    }

    public function resolve($root, $args){
        if (isset($args['id'])) {
            return Camera::find($args['id'])->get();
        }
        if (isset($args['code'])) {
            return Camera::where('code', $args['code'])->get();
        }
        return Camera::all();
    }
}
