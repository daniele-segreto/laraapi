<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // LARAVEL:
        // 1) Automaticamente, quando facciamo 'User::factory' andrà a vedere se c'è una Factory (un file) che abbia il nome 'UserFactory' sotto la cartella 'factories';
        // 2) Automaticamente creerà quello che abbiamo in 'definition()' (appunto sul file 'UserFactory.php'), per 10 volte (*).
        \App\Models\User::factory(10)->create();  //chiamo il modello User

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
