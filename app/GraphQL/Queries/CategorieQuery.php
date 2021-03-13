<?php
    namespace App\GraphQL\Queries;

    use App\Categorie;
    use Closure;
    use GraphQL;
    use GraphQL\Type\Definition\ResolveInfo;
    use GraphQL\Type\Definition\Type;
    use Rebing\GraphQL\Support\Query;

    class CategorieQuery extends Query
    {
        protected $attributes = [
            "name"=>"CategorieQuery",
        ];


        public function type(): Type
        {
            return Type::listOf(GraphQL::type('categorie'));
        }

        public function args(): array
        {
            return [
                "id"=>['name'=>"id", "type"=>Type::int()],
                "nom"=>['name'=>"nom", "type"=>Type::string()],
            ];
        }

        public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $closure){
            if (isset($args['id'])) {
                return Categorie::where('id', $args['id'])->get();
            }

            if (isset($args['nom'])) {
                return Categorie::where('nom', $args['nom'])->get();
            }
                    
            return Categorie::all();

        }
    }
    