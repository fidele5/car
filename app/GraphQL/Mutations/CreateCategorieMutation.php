<?php
namespace App\GraphQL\Mutations;

use App\Categorie;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateCategorieMutation extends Mutation
{
    protected $attributes = [
        "name"=>"createCategorie"
    ];

    public function type(): Type
    {
        return GraphQl::type('categorie');
    }

    public function args(): array
    {
        return [
            "id"=>['name'=>"id", "type"=>Type::int()],
            "nom"=>['name'=>"nom", "type"=>Type::string()],
            "tarif_id"=>['name'=>"tarif_id", "type"=>Type::int()]
        ];
    }

    public function rules(array $args = []):array
    {
        return [
            "nom"=>['required'],
            "tarif_id"=>["required"],
        ];
    }

    public function resolve($root, $args){
        return Categorie::create($args);
    }
}
