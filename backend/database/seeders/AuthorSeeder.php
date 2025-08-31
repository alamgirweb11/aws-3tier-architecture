<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        // Create 20 fake authors
        Author::factory()->count(20)->create();
    }
}
