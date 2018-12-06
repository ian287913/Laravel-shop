<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $tags = ['最新推出', '特價中','高效能', '高畫質', '高記憶體', '輕薄易攜', '電競筆電', '文書筆電'];

        foreach (range(0,7) as $i){
            Tag::create([
               'name' => $tags[$i],
            ]);
        }
    }
}
