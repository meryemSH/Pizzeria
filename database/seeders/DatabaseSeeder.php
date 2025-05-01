<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Faq;
use App\Models\SchoolPartnership;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use Database\Seeders\WorkshopSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'client',
            'email' => 'client@admin.com',
        ]);

        // $this->call([
        //    WorkshopSeeder::class,
        // ]);

        Faq::factory(10)->create();

    }
}
