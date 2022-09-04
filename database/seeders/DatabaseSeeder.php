<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\productSpecification;
use App\Models\subCategory;
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
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password'=>Hash::make('password'),
         ]);

        category::factory(10)->create();
        subCategory::factory(30)->create();
        brand::factory(15)->create();
        product::factory(30)->create();
        productSpecification::factory(70)->create();
    }
}
