<?php
namespace App\GraphQL\Mutations;

use App\Poste;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeletePosteMutation extends Mutation
{
    protected $attributes = [
        'name'=>'deletePoste'
    ];

    public function type(): Type
    {
        return GraphQL::type('poste');
    }

    public function args(): array
    {
        return [
            "id"=>[
                'name'=>"id", 
                "type"=>Type::int(), 
                "rules"=>['required']
            ]
        ];
    }

    public function resolve($root, $args){
        Poste::find($args['id'])->delete();
    }
}