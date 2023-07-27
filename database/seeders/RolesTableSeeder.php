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
        Role::insert([
            [
                'id' => '1',
                'name' => 'Superadmin',
                'slug' => 'superadmin',
                'description' => 'Super Administrator Role',
            ],

            [
                'id' => '2',
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator Role',
            ],
        ]);




    }
}
