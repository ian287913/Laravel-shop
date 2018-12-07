<?php

use App\Category;
use App\OperationSystem;
use App\Product;
use App\Tag;
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
        OperationSystem::truncate();
        Tag::truncate();

        $faker = Faker\Factory::create('zh_TW');
        $tags = ['最新推出', '特價中','高效能', '高畫質', '高記憶體', '輕薄易攜', '電競筆電', '文書筆電'];
        $total = 30;
        $brand = ['Apple','MSI', 'ASUS', 'Acer','Lenovo','Hp'];
        $OS = ['Windows','MacOS','Linux'];


        foreach (range(0,7) as $i){
            Tag::create([
                'name' => $tags[$i],
            ]);
        }

        foreach (range(0,5) as $i) {
            Category::create([
                'name'=>$brand[$i],
            ]);
        }

        foreach (range(0,2) as $i) {
            OperationSystem::create([
                'name'=>$OS[$i],
            ]);
        }

        foreach (range(1, $total) as $id) {
            Product::create([
                'name' => $faker->realText(rand(10, 15)),
                'price' => rand(100, 1000),
                'size' => $faker->realText(rand(10, 15)),
                'cpu' => $faker->realText(rand(10, 15)),
                'gpu' => $faker->realText(rand(10, 15)),
                'ram' => $faker->realText(rand(10, 15)),
                'storage' => $faker->realText(rand(10, 15)),
                'description' => $faker->realText(rand(10, 15)),
                'category_id' => rand(1, 6),
                'os_id' => rand(1, 3),
                'tags' => $tags[rand(0,7)],
                'img' => 'storage/images/nb.jpg',
                'created_at' => now()->subDays($total - $id)->addHours(rand(1, 5))->addMinutes(rand(1, 5)),
                'updated_at' => now()->subDays($total - $id)->addHours(rand(6, 10))->addMinutes(rand(10, 30)),
            ]);
        }
    }
}
