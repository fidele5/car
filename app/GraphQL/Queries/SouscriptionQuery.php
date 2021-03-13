<?php 
namespace App\GraphQL\Queries;

use App\Souscription;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class SouscriptionQuery extends Query
{
    protected $attributes = [
        'name'=>'souscriptionQuery'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('souscription'));
    }

    public function args(): array
    {
        return [
            'id'=>[
                'type'=>Type::int(),
                'description'=>'the identifyer of soubscription'
            ],
            'camera_id'=>[
                'type'=>Type::int(),
                'description'=>'the associated camera',
            ],
            'poste_id'=>[
                'type'=>Type::int(),
                'description'=>'the associated post'
            ],
            'user_id'=>[
                'type'=>Type::int(),
                'description'=>'the associated user'
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if(isset($args['id'])) return Souscription::find($args['id'])->get();
        return Souscription::all();
    }
}
