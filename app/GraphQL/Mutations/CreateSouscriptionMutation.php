<?php
namespace App\GraphQL\Mutations;

use App\Souscription;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateSouscriptionMutation extends Mutation
{
    protected $attributes = [
        'name'=>'createSouscription'
    ];

    public function type(): Type
    {
        return GraphQL::type('souscription');
    }

    public function args(): array
    {
        return [
            'id'=>[
                'type'=>Type::int(),
                'description'=>'the identifyer of soubscription',
            ],
            'camera_id'=>[
                'type'=>Type::int(),
                'description'=>'the associated camera',
                'rules'=>['required']
            ],
            'poste_id'=>[
                'type'=>Type::int(),
                'description'=>'the associated post',
                'rules'=>['required']
            ],
            'user_id'=>[
                'type'=>Type::int(),
                'description'=>'the associated user',
                'rules'=>['required']
            ],
        ];
    }

    public function resolve($root, $args){
        return Souscription::create($args);
    }
}
