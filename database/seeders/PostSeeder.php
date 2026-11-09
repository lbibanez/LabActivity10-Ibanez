<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();
        $kagawad = Author::where('email', 'kagawad.ibanez@bulletin.test')->first();

        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Ibanez Clean-up Drive',
            'category' => 'Disaster Preparedness',
            'body' => 'All residents of Purok Ibanez are encouraged to join the upcoming clean-up drive.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-05-05 08:00:00',
        ]);
    }
}