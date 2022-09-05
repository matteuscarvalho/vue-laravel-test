<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
            'name' => 'Administrador',
        ]);

        User::factory()->create([
            'email' => 'comum@comum.com',
            'password' => Hash::make('comum@comum.com'),
            'name' => 'Comum',
        ]);

        $this->call(RolesSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
    }
}
