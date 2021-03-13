<?php
namespace App\GraphQL\Mutations;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteUserMutator extends Mutation{
    protected $attributes = [
        'name'=>'deleteUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return [
            "id"=>['name'=>"id", "type"=>Type::int(), "rules"=>['required']]
        ];
    }

    public function resolve($root, $args){
        extract($args);

        User::find($args['id'])->delete();

        return User::all();
    }
}