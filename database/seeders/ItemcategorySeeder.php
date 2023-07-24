<?php

namespace Database\Seeders;

use App\Models\Itemcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Itemcategory::create([
            'name' => 'Monitor',
            'slug' => 'monitor',
        ]);
    }
}
