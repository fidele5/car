<?php 
namespace App\GraphQL\Queries;

use GraphQL;
use App\Poste;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class PosteQuery extends Query{
    protected $attributes=[
        "name"=>"posteQuery"
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQl::type('poste'));
    }
    
    public function args(): array
    {
        return [
            "id"=>[
                "type"=>Type::int(),
                "description"=>"the unique id of post"
            ],
            "designation"=>[
                "type"=>Type::string(),
                "description"=>"the name of the post"
            ],
            "adresse"=>[
                "type"=>Type::string(),
                "description"=>"the adress of the post",
            ],
            "code"=>[
                "type"=>Type::string(),
                "description"=>"the code of post",
            ],
        ];
    }


    public function resolve($root, $args){
        if (isset($args['id'])) {
            return Poste::find($args['id'])->get()->first();
        }

        if (isset($args['code'])) {
            return Poste::where('code', $args['code'])->get();
        }
        
        return Poste::all();
    }
}