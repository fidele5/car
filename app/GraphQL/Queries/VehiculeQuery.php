<?php
namespace App\GraphQL\Queries;

use App\Vehicule;
use Closure;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class VehiculeQuery extends Query
{
    protected $attribute = [
        "name" => "vehiculeQuery",
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('vehicule'));
    }

    public function args(): array
    {
        return [
            "id" => ['name' => "id", "type" => Type::int()],
            "numero_plaque" => ['name' => "numero_plaque", "type" => Type::string()],
            "image" => ['name' => "image", "type" => Type::string()],
            "num_chassis" => ['name' => "num_chassis", "type" => Type::string()],
            "file_document" => ['name' => "file_document", "type" => Type::string()],
            "annee" => ['name' => "annee", "type" => Type::int()],
            "categorie_id" => ["name" => "categorie_id", "type" => Type::int()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $closure)
    {
        if (isset($args['numero_plaque'])) {
            return Vehicule::where("numero_plaque", $args['numero_plaque'])->get();
        }

        if (isset($args['num_chassis'])) {
            return Vehicule::where("num_chassis", $args['num_chassis'])->get();
        }

        if (isset($args['id'])) {
            return Vehicule::find($args['id'])->get();
        }

        return Vehicule::all();
    }

}
