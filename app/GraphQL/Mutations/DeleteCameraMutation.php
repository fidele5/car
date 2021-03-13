<?php 
namespace App\GraphQL\Mutations;

use GraphQL;
use App\Camera;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteCameraMutation extends Mutation
{
    protected $attributes = [
        'name'=>'deleteCamera',
    ];

    public function type(): Type
    {
        return GraphQL::type('camera');
    }

    public function args(): array
    {
        return [
            'id'=>[
                'type'=>Type::int(),
                'description'=>'id of camera to delete',
                'rules'=>['required'],
            ],
        ];
    }

    public function resolve($root, $args){
        Camera::find($args['id'])->delete();
        return Camera::all();
    }
}
