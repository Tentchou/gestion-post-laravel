<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = collect(['Livre', 'Jeux-video', 'Films']);

        $categorie->each(fn($category)=>Categorie::create([
            'name'=>$category,
            'slug'=>Str::slug($category)
        ]));
        //
    }
}
