<?php
namespace App\GraphQL\Mutations;

use App\Souscription;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateSouscriptionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateSouscription',
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
            ],
            'camera_id' => [
                'type' => Type::int(),
                'description' => 'the associated camera',
            ],
            'poste_id' => [
                'type' => Type::int(),
                'description' => 'the associated post',
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'the associated user',
            ],
        ];
    }

    public function resolve($root, $args)
    {
        Souscription::find($args['id'])->update($args);
        return Souscription::find($args['id'])->get();
    }
}
