<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator role',
        ]);

        Role::create([
          'name' => 'User',
          'slug' => 'user',
          'description' => 'User role',
      ]);

        Role::create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => 'Moderator role',
        ]);
    }
}
