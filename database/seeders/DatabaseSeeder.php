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
         User::factory()->create([
             'name' => 'John Smith',
             'email' => 'johnsmith2001@gmail.com',
             'password' => bcrypt('1106'),
         ]);
    }
}
