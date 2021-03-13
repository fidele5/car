<?php
namespace App\GraphQl\Types;

use App\Categorie;
use App\Vehicule;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategorieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Categorie',
        'description' => 'Categories',
        'model' => Categorie::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'nom' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The categories name',
            ],
            'vehicules'=>[
                'type'=>Type::listOf(GraphQL::type('vehicule')),
                'description'=>"A list of Vehicules for this categorie",
                'args'=>[
                    "id" => ['name' => "id", "type" => Type::int()],
                    "numero_plaque" => ['name' => "numero_plaque", "type" => Type::string()],
                    "image" => ['name' => "image", "type" => Type::string()],
                    "num_chassis" => ['name' => "num_chassis", "type" => Type::string()],
                    "file_document" => ['name' => "file_document", "type" => Type::string()],
                    "annee" => ['name' => "annee", "type" => Type::int()],
                ],
                'always'=>['id', 'image', 'num_chassis', 'numero_plaque'],
                'query'=> function(array $args, $query, $ctx) {

                    if (isset($args['id'])) {
                        return $query->find($args['id'])->get();
                    }
                    return Vehicule::all();
                }
            ],
            "tarif"=>[
                "type"=>GraphQL::type('tarif'),
                "description"=>"the tarif correspondace"
            ],
        ];
    }
}
