<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Teknologi']);
        Category::create(['name' => 'Politik']);
        Category::create(['name' => 'Hiburan']);
    }
}
