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
            'title' => 'E-commerce Platform',
            'slug' => 'e-commerce-platform',
            'description' => 'Una piattaforma di e-commerce full-stack con carrello, checkout e area amministrativa.',
            'image' => null,
            'type_id' => Type::where('name', 'Back End')->first()->id,
        ]);

        Project::create([
            'title' => 'Task Manager App',
            'slug' => 'task-manager-app',
            'description' => 'Applicazione per la gestione di task e progetti, con drag & drop e notifiche in tempo reale.',
            'image' => null,
            'type_id' => Type::where('name', 'Back End')->first()->id,
        ]);

        Project::create([
            'title' => 'Portfolio Personale',
            'slug' => 'portfolio-personale',
            'description' => 'Sito portfolio responsive per presentare progetti ed esperienze professionali.',
            'image' => null,
            'type_id' => Type::where('name', 'Web Design')->first()->id,
        ]);
    }
}
