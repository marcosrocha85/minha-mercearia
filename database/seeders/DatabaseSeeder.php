<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Criar uma pessoa (cliente/funcionário) e vincular à conta de teste
        $person = Person::factory()->create([
            'name' => 'Test Person',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'person_id' => $person->id,
            'role' => 'employee',
        ]);
    }
}
