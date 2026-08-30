<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Tabellone Partenze Treni',
            'slug' => 'laravel-migration-seeder',
            'description' => 'Tabellone partenze treni in Laravel, in stile display da stazione: esercizio su Migration, Eloquent e Controller, con vista Blade personalizzata in Bootstrap e SCSS.',
            'image' => 'projects/tabellone-treni.png',
            'repo_url' => 'https://github.com/francesco-cassese/laravel-migration-seeder',
            'type_id' => Type::where('name', 'Back End')->first()->id,
        ]);

        Project::create([
            'title' => 'CineList',
            'slug' => 'laravel-model-controller',
            'description' => 'Catalogo film con Model Eloquent collegato al database e Controller che ne recupera i dati, mostrati tramite card con grafica personalizzata in SASS.',
            'image' => 'projects/cinelist.webp',
            'repo_url' => 'https://github.com/francesco-cassese/laravel-model-controller',
            'type_id' => Type::where('name', 'Back End')->first()->id,
        ]);

        Project::create([
            'title' => 'Laravel Comics',
            'slug' => 'laravel-comics',
            'description' => 'Catalogo fumetti con layout Blade condiviso tra le pagine: partial per header e footer, dati letti da file di configurazione e componenti riutilizzabili.',
            'image' => 'projects/laravel-comics.webp',
            'repo_url' => 'https://github.com/francesco-cassese/laravel-comics',
            'type_id' => Type::where('name', 'Back End')->first()->id,
        ]);

        Project::create([
            'title' => 'Laravel Primi Passi',
            'slug' => 'laravel-primi-passi',
            'description' => 'Esercizio sulle basi del routing in Laravel: rotte con dati dinamici passati alla view e più pagine collegate tramite la funzione route().',
            'image' => 'projects/laravel-primipassi.webp',
            'repo_url' => 'https://github.com/francesco-cassese/laravel-primi-passi',
            'type_id' => Type::where('name', 'Back End')->first()->id,
        ]);
    }
}
