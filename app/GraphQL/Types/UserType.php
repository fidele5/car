<?php
    namespace App\GraphQl\Types;

    use App\User;
    use GraphQL;
    use GraphQL\Type\Definition\Type;
    use Rebing\GraphQL\Support\Type as GraphQLType;


    class UserType extends GraphQLType
    {
        protected $attributes = [
            'name'=>'User',
            'description'=>'Utilisateurs',
            'model'=>User::class
        ];

        public function fields(): array
        {
            return [
                'id' => [
                    'type' => Type::nonNull(Type::int()),
                    'description' => 'The id of the user',
                ],
                'nom' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The name of user',
                ],
                'postnom' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The postname of the user',
                ],
                'prenom' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The nickname of user',
                ],
                'login' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The login of the user',
                ],
                'adresse' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The adress of user',
                ],
                'telephone' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The phone number of user',
                ],
                'email'=>[
                    'type'=>Type::string(),
                    'description'=>'The email of user',
                ],
                'password' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The password of user',
                ],
                'role' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Rules of user',
                ],
                'isMe' => [
                    'type' => Type::boolean(),
                    'description' => 'True, if the queried user is the current user',
                    'selectable' => false, // Does not try to query this from the database
                ],
                'souscriptions' => [
                    'type' => Type::listOf(GraphQL::type('souscription')),
                    'description' => 'the souscriptions of current user'
                ],
            ];
        }
    }
    