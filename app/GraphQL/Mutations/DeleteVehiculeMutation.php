<?php
namespace App\GraphQL\Mutations;

use App\Vehicule;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteVehiculeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteVehicule',
    ];

    public function type(): Type
    {
        return GraphQL::type('vehicule');
    }

    public function args(): array
    {
        return [
            "id" => ['name' => "id", "type" => Type::int(), "rules" => ['required']],
        ];
    }

    public function resolve($root, $args)
    {
        Vehicule::find($args['id'])->delete();
        return Vehicule::all();
    }
}
