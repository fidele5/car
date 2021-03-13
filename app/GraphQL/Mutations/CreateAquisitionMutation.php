<?php
namespace App\GraphQL\Mutations;

use GraphQL;
use App\Aquisition;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Query;

class CreateAquisitionMutation extends Mutation
{
    protected $attributes = [
        "name"=>"createAquisition",
    ];

    public function type(): Type
    {
        return GraphQl::type('acquisition');
    }

    public function args(): array
    {
        return [
            "date_acquisition"=>['name'=>"date_acquisition", "type"=>Type::string()],
            "type"=>['name'=>"type", "type"=>Type::string()],
            "vehicule_id"=>['name'=>"vehicule_id", "type"=>Type::int()],
            "user_id"=>['name'=>"user_id", "type"=>Type::int()],
        ];
    }


    public function resolve($root, $args)
    {
        $args['date_acquisition'] = Carbon::now()->toDateTimeString();
        return Aquisition::create($args);
    }
}
