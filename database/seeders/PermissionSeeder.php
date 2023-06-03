<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'User List', 'slug' => 'user-list', 'description' => 'Can view the list of users'],
            ['name' => 'User Create', 'slug' => 'user-create', 'description' => 'Can create new users'],
            ['name' => 'User Edit', 'slug' => 'user-edit', 'description' => 'Can edit existing users'],
            ['name' => 'User Delete', 'slug' => 'user-delete', 'description' => 'Can delete users'],

            //For Role

            ['name' => 'Role List', 'slug' => 'role-list', 'description' =>'Can view the list of roles'],
            ['name' => 'Role Create','slug' => 'role-create', 'description' => 'Can create new roles'],
            ['name' => 'Role Edit','slug' => 'role-edit', 'description' => 'Can edit existing roles'],
            ['name' => 'Role Delete','slug' => 'role-delete', 'description' => 'Can delete roles'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
