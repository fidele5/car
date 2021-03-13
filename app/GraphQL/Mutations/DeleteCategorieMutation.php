<?php
namespace App\GraphQL\Mutations;

use App\Categorie;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteCategorieMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCategorie',
    ];

    public function type(): Type
    {
        return GraphQL::type('categorie');
    }

    public function args(): array
    {
        return [
            "id" => ['name' => "id", "type" => Type::int(), "rules" => ['required']],
        ];
    }

    public function resolve($root, $args)
    {
        Categorie::find($args['id'])->delete();
        return Categorie::all();
    }
}
