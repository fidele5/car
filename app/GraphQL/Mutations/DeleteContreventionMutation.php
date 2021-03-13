<?php 
namespace App\GraphQL\Mutations;

use App\Contrevention;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteContreventionMutation extends Mutation
{
    protected $attributes = [
        'name'=>'deleteContrevention'
    ];  

    public function type(): Type
    {
        return GraphQL::type('contrevention');
    }

    public function args(): array
    {
        return [
            'id'=>[
                'type'=>Type::int(),
                'description'=>'the id of contrevention to delete',
                'rules'=>['required']
            ]
        ];
    }

    public function resolve($root, $args){
        Contrevention::find($args['id'])->delete();
        return Contrevention::all();
    }
}
