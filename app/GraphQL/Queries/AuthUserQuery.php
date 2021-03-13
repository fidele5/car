<?php
namespace App\GraphQL\Queries;

use App\User;
use GraphQL;
use GraphQL\GraphQL as GraphQLGraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Query;

class AuthUserQuery extends Query{
    protected $attributes = [
        "name"=>"authenticate"
    ];

    public function type():type
    {
        return GraphQL::type('user');
    }

    public function args(Type $var = null):array
    {
        return [
            "login"=>['name'=>"login", "type"=>Type::string()],
            "password"=>['name'=>"password", "type"=>Type::string()],
        ];
    }

    public function resolve($root, $args){
        extract($args);
        if(Auth::attempt(['login' => $login, 'password' => $password])){
            return Auth::user();
        }
        else return null;
    }
}