<?php
namespace App\GraphQL\Mutations;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserMutation extends Mutation{
    protected $attributes = [
        'name'=>"pdateUser"
    ];

    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return[
            'nom' => ['name' => 'nom', 'type' => Type::string()],
            'postnom' => ['name' => 'postnom', 'type' => Type::string()],
            'prenom' => ['name' => 'prenom', 'type' => Type::string()],
            'login' => ['name' => 'login', 'type' => Type::string()],
            'adresse' => ['name' => 'adresse', 'type' => Type::string()],
            'telephone' => ['name' => 'telephone', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()],
            'role' => ['name' => 'role', 'type' => Type::string()],
            'id' => ['name' => 'id', 'type' => Type::int(), 'rules'=>["required"]],
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'id.required'=>"Veuillez renseigner l'id de l'utilisateur à modifier"
        ];
    }


    public function resolve($root, $args){
        if (isset($args['password'])) {
            $args['password'] = Hash::make($args['password']);
            User::find($args['id'])->update($args);
            return User::find($args['id']);
        }
        
        User::find($args['id'])->update($args);
        return User::find($args['id'])->get();
    }
}