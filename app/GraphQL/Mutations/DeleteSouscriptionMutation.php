<?php
namespace App\GraphQL\Mutations;

use App\Souscription;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteSouscriptionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteSouscription',
    ];

    public function type(): Type
    {
        return GraphQL::type('souscription');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'the identifyer of soubscription',
                'rules'=>['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        Souscription::find($args['id'])->delete();
        return Souscription::all();
    }
}
