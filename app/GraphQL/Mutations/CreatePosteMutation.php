<?php
namespace App\GraphQL\Mutations;

use App\Poste;
use GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class CreatePosteMutation extends Mutation
{
    protected $attributes = [
        "name"=>"createPoste",
    ];

    public function type(): Type
    {
        return GraphQL::type('poste');
    }

    public function args(): array
    {
        return [
            "id"=>[
                "type"=>Type::int(),
                "description"=>"the unique id of post",
            ],
            "designation"=>[
                "type"=>Type::string(),
                "description"=>"the name of the post",
                "rules"=>['required']
            ],
            "adresse"=>[
                "type"=>Type::string(),
                "description"=>"the adress of the post",
                'rules'=>['required']
            ],
            "code"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the code of post",
                "rules"=>['required']
            ],
        ];
    }

    public function resolve($root, $args){
        return Poste::create($args);
    }
}
