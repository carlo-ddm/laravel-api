<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'Javascript', 'PHP', 'C++'];
        foreach ($data as $categories) {
            $new_category = new Category();
            $new_category->name = $categories;
            $new_category->slug = Str::slug($categories. '-');
            $new_category->save();
        }
    }
}
