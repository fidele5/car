<?php
namespace App\GraphQL\Mutations;

use App\Categorie;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateCategorieMutation extends Mutation
{
    protected $attributes = [
        "name"=>"updateCategorie"
    ];

    public function type(): Type
    {
        return GraphQL::type('categorie');
    }

    public function args(): array
    {
        return [
            "id" => ['name' => "id", "type" => Type::int()],
            "nom" => ['name' => "nom", "type" => Type::string()],
            "tarif_id" => ["name"=>"tarif_id", "type"=>Type::int()]
        ];

    }

    public function rules(array $args = []):array
    {
        return [
            "id"=>['required'],
            "tarif_id"=>["required"]
        ];
    }

    public function resolve($root, $args){
        Categorie::find($args["id"])->update($args);
        return Categorie::all();
    }
}