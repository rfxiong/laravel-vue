<?php

use Illuminate\Database\Seeder;
use App\Admin\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => '新闻',
        ]);
    }
}
