<?php
namespace App\GraphQL\Mutations;

use App\Contrevention;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateContreventionMutation extends Mutation
{
   protected $attributes = [
        'name'=>'createContrevention',
   ];

   public function type(): Type
   {
       return GraphQL::type('contrevention');
   }

   public function args(): array
   {
       return [
            'id' => [
                'type' => Type::int(),
                'description' => 'the identifyer of the contrevention',
            ],
            'capture' => [
                'type' => Type::string(),
                'description' => 'the cars screenshot',
                'rules'=>['required']
            ],
            'taxe_id' => [
                'type' => Type::int(),
                'description' => 'the associated taxe',
                'rules'=>['required']
            ],
            'vehicule_id' => [
                'type' => Type::int(),
                'description' => 'the associated car',
                'rules'=>['required']
            ],
            'camera_id' => [
                'type' => Type::int(),
                'description' => 'the associated camera',
                'rules'=>['required']
            ]
        ];
   }

   public function resolve($root, $args){
       return Contrevention::create($args);
   }
}