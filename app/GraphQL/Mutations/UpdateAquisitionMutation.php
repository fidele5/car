<?php 
namespace App\GraphQL\Mutations;

use App\Aquisition;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateAquisitionMutation extends Mutation
{
    protected $attributes = [ "name"=>"updateAquisition"];

    public function type(): Type
    {
        return GraphQL::type('acquisition');
    }

    public function args(): array
    {
        return [
            "id"=>['name'=>"id","type"=>Type::int()],
            "date_acquisition" => ['name' => "date_acquisition", "type" => Type::string()],
            "type" => ['name' => "type", "type" => Type::string()],
            "vehicule_id" => ['name' => "vehicule_id", "type" => Type::int()],
            "user_id" => ['name' => "user_id", "type" => Type::int()],
        ];
    }

    public function rules(array $args = []):array
    {
        return ["id"=>["required"]];
    }

    public function resolve($root, $args){
        Aquisition::find($args['id'])->update($args);
        return Aquisition::all();
    }
}
