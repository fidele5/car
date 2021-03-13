<?php 
namespace App\GraphQl\Types;

use App\Poste;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type AS GraphQLType;

class PosteType extends GraphQLType
{
    protected $attributes = [
        "name"=>"Poste",
        "description"=>"Postes",
        "model"=>Poste::class,
    ];

    public function fields(): array
    {
        return [
            "id"=>[
                "type"=>Type::nonNull(Type::int()),
                "description"=>"the unique id of post"
            ],
            "designation"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the name of the post"
            ],
            "adresse"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the adress of the post",
            ],
            "code"=>[
                "type"=>Type::nonNull(Type::string()),
                "description"=>"the code of post",
            ],
            'souscriptions'=>[
                'type'=>Type::listOf(GraphQL::type('souscription')),
                'description'=>'the souscriptions from this post',
            ],
        ];
    }
}