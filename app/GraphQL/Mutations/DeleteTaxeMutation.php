<?php 
namespace App\GraphQL\Mutations;
use App\Taxe;
use GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteTaxeMutation extends Mutation
{
    protected $attributes = [
        "name"=>"deleteType"
    ];

    public function type(): Type
    {
        return GraphQL::type('taxte');
    }

    public function args(): array
    {
        return [
            "id"=>['name'=>'id', 'type'=>Type::int(), "rules"=>['required']],
        ];
    }
    public function resolve($root,$args){
        Taxe::find($args['id'])->delete();
        return Taxe::all();
    }

}
