<?php
namespace App\GraphQL\Mutations;

use App\Aquisition;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAquisitionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAquisition',
    ];

    public function type(): Type
    {
        return GraphQL::type('acquisition');
    }

    public function args(): array
    {
        return [
            "id" => ['name' => "id", "type" => Type::int(), "rules" => ['required']],
        ];
    }

    public function resolve($root, $args)
    {
        Aquisition::find($args['id'])->delete();
        return Aquisition::all();
    }
}
