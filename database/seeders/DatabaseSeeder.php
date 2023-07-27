<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\LocationSeeder;
use Database\Seeders\SupplierSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\ItemcategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PermissionSeeder::class,
            RolesTableSeeder::class,
            DepartmentSeeder::class,
            ItemcategorySeeder::class,
            LocationSeeder::class,
            SupplierSeeder::class,
            PersonSeeder::class,
        ]);

        

        $department = Department::where('slug', 'superadmin')->first();


        User::insert([
            [
                'id' => '1',
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'department_id' => $department->id,
                'password' => Hash::make('$3cur3p@ssw0rd'),
            ],
            [
                'id' => '2',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'department_id' => $department->id,
                'password' => Hash::make('$3cur3p@ssw0rd'),
            ],
        ]);


        // // 1 Super Admin
        // $user = new User();
        // $user->id = '1';
        // $user->name = 'superadmin';
        // $user->email = 'superadmin@gmail.com';
        // $user->password = Hash::make('$3cur3p@ssw0rd');
        // $user->save();




        $role_user = [
          ['role_id'=>1, 'user_id'=>1],
          ['role_id'=>2, 'user_id'=>2],
      ];
      DB::table('role_user')->insert($role_user);

        $permission_user = [
          // For Admin
          ['user_id'=>2, 'permission_id'=>1],
          ['user_id'=>2, 'permission_id'=>2],
          ['user_id'=>2, 'permission_id'=>3],
          ['user_id'=>2, 'permission_id'=>4],
          ['user_id'=>2, 'permission_id'=>5],
          ['user_id'=>2, 'permission_id'=>6],
          ['user_id'=>2, 'permission_id'=>7],
          ['user_id'=>2, 'permission_id'=>8],


      ];
      DB::table('permission_user')->insert($permission_user);

      $permission_role = [
          //---Admin-----
          ['permission_id'=>1, 'role_id'=>2],
          ['permission_id'=>2, 'role_id'=>2],
          ['permission_id'=>3, 'role_id'=>2],
          ['permission_id'=>4, 'role_id'=>2],
          ['permission_id'=>5, 'role_id'=>2],
          ['permission_id'=>6, 'role_id'=>2],
          ['permission_id'=>7, 'role_id'=>2],
          ['permission_id'=>8, 'role_id'=>2],


      ];
      DB::table('permission_role')->insert($permission_role);
    }
}
