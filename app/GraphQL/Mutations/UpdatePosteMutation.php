<?php
namespace App\GraphQL\Mutations;

use App\Poste;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdataPosteMutation extends Mutation{
    protected $attributes = [
        "name"=>"updatePoste"
    ];

    public function type(): Type
    {
        return GraphQL::type('poste');
    }


    public function args(): array
    {
        return[
            "id"=>[
                "type"=>Type::int(),
                "description"=>"the unique id of post",
                "rules"=>['required']
            ],
            "designation"=>[
                "type"=>Type::string(),
                "description"=>"the name of the post",
            ],
            "adresse"=>[
                "type"=>Type::string(),
                "description"=>"the adress of the post",
            ],
            "code"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the code of post",
            ],
        ];
    }

    public function resolve($root, $args){
        Poste::find($args['id'])->update($args);
        return Poste::find($args['id'])->get()->first();
    }
}

