<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Category::truncate();
        $faker = Faker\Factory::create('zh_TW');
        $total = 5;
        $brand = ["MSI", 'ASUS', 'ACER'];
        foreach (range(0,2) as $i) {
            $category = Category::create([
                'name'=>$brand[$i],
            ]);
            foreach (range(1, $total) as $id){
                Product::create([
                    'name'=>$faker->realText(rand(10,15)),
                    'price'=>rand(100,1000),
                    'size'=>$faker->realText(rand(10,15)),
                    'cpu'=>$faker->realText(rand(10,15)),
                    'gpu'=>$faker->realText(rand(10,15)),
                    'ram'=>$faker->realText(rand(10,15)),
                    'storage'=>$faker->realText(rand(10,15)),
                    'description'=>$faker->realText(rand(10,15)),
                    'category_id'=>$category->id,
                    'created_at' => now()->subDays($total - $id)->addHours(rand(1, 5))->addMinutes(rand(1, 5)),
                    'updated_at' => now()->subDays($total - $id)->addHours(rand(6, 10))->addMinutes(rand(10, 30)),
                ]);
            }
        }
    }
}
