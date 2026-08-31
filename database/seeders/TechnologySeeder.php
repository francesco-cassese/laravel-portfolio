<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'Laravel',
            'PHP',
            'Bootstrap',
            'SCSS',
            'MySQL',
        ];

        foreach ($technologies as $name) {
            $technology = new Technology();
            $technology->name = $name;
            $technology->color = fake()->hexColor();
            $technology->save();
        }
    }
}
