<?php
namespace App\GraphQL\Mutations;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Mutation;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name'=>"CreateUser"
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
        ];
    }

    public function rules(array $args = []): array
    {
        return [
            'nom'=>['required'],
            'postnom'=>['required'],
            'prenom'=>['required'],
            'login'=>['required'],
            'adresse'=>['required'],
            'telephone'=>['required'],
            'email'=>['required', 'email'],
            'password'=>['required'],
        ];
    }

    public function validationErrorMessages ($args = []):array
    {
        return [
            'nom.required' => 'Entrer votre nom',
            'nom.string' => 'Le nom doit être alphabétique',
            'email.required' => 'Entrer votre adresse email',
            'email.email' => 'Entrer un adresse mail valide',
            'email.exists' => 'Oups, cet adresse email est deja utilisé',                     
            'postnom.required' => 'Veuillez renseigner votre postnom',                     
            'prenom.required' => 'Veuillez renseigner votre prenom',                     
            'adresse.required' => 'Veuillez renseigner votre adresse',                     
            'telephone.required' => 'Veuillez renseigner votre numero de telephone',                     
            'password.required' => 'Veuillez renseigner votre mot de passe',                     
        ];
    }

    public function resolve($root, $args)
    {
        $args['password'] = Hash::make($args['password']);
        
        return User::create($args);

    }

}
