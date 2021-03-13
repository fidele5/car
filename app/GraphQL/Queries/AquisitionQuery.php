<?php
namespace App\GraphQL\Queries;

use App\Aquisition;
use Closure;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class AquisitionQuery extends Query
{
    protected $attributes = [
        "name" => "aquisitionQuery",
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('acquisition'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user',
            ],
            'date_acquisition' => [
                'type' => Type::string(),
                'description' => 'The aquiert date',
            ],
            'type' => [
                'type' => Type::string(),
                'description' => 'The type',
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $closure)
    {
        return Aquisition::all();
    }
}
