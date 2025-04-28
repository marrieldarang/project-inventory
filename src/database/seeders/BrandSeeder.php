<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['Samsung', 'Apple', 'Sony', 'LG', 'Nike'];

        foreach ($brands as $name) {
            Brand::create(['name' => $name]);
        }
    }
}
