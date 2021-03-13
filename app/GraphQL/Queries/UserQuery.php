<?php
namespace App\GraphQL\Queries;

use App\User;
use Closure;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'Users query',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'role' => ['name' => 'role', 'type' => Type::string()],
            'login' => ['name' => 'login', 'type' => Type::string()],
            'count'=>[
                'name'=>'count',
                'type'=>Type::int(),
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $closure)
    {
        if (isset($args['id'])) {
            return User::where('id', $args['id'])->get();
        }

        if (isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }

        if (isset($args['role'])) {
            return User::where('role', $args['role'])->get();
        }

        if (isset($args['count'])) {
            return User::paginate($args['count']);
        }

        if (isset($args['login'])) {
            return User::where('login', $args['login'])->get();
        }

        return User::all();
        
    }
}
