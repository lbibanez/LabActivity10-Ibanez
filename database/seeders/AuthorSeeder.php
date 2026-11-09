<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Kagawad Luis Ibanez',
            'position' => 'Kagawad',
            'email' => 'kagawad.ibanez@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}