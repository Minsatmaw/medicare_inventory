<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // DB::table('permissions')->insert([
        //     ['name' => 'User List', 'slug' => 'user-list','description' => 'Can view the list of users'],
        //     ['name' => 'User List', 'slug' => 'user-list', 'description' => 'Can view the list of users'],
        //     ['name' => 'User Create', 'slug' => 'user-create', 'description' => 'Can create new users'],
        //     ['name' => 'User Edit', 'slug' => 'user-edit', 'description' => 'Can edit existing users'],
        //     ['name' => 'User Delete', 'slug' => 'user-delete', 'description' => 'Can delete users'],

        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
