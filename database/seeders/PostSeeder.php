<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //selection categories
        $categorie = Categorie::all();
        //selection tags
        $tags = Tag::all();
        //selection des utilisateurs
        $user = User::all();
        Post::factory(20)
        ->sequence(fn ()=>[
            'category_id'=>$categorie->random(),
        ])
        //on indique le nombre de comentaire a generer pour chaque post
        ->hasComments(5, fn()=>['user_id'=>$user->random()])
        ->create()
        ->each(fn ($posts) => $posts->tags()->attach($tags->random(rand(0, 3))));
        //
    }
}
