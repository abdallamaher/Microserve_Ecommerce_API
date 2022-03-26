<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (range(0, 19) as $index) {
            Product::find($index + 1)->categories()->attach($index + 1);
        }
    }
}
