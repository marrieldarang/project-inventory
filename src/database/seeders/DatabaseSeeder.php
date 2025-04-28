<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user with a known password
        User::factory()->create([
            'name' => 'User Me',
            'email' => 'user@example.com',
            'password' => bcrypt('admin'), // 👈 Set your own password here
        ]);

        // Also call Category and Brand seeders
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
        ]);
    }
}
