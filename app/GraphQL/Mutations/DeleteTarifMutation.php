<?php 
namespace App\GraphQL\Mutations;

use GraphQL;
use App\Tarif;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteTarifMutation extends Mutation
{
    protected $attributes = [
        "name"=>"deleteTarif"
    ];


    public function type(): Type
    {
        return GraphQL::type('tarif');
    }

    public function args(): array
    {
        return [
            "id"=>["name"=>"id", "type"=>Type::int(), "rules"=>['required']]
        ];
    }

    public function reolve($root, $args){
        Tarif::find($args['id'])->delete();
        return Tarif::all();
    }


}
