<?php

use Illuminate\Database\Seeder;
use App\Category;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'PHP';
        $category->save();
        $category = new Category();
        $category->name = 'JAVASCRIPT';
        $category->save();
        $category = new Category();
        $category->name = 'LARAVEL';
        $category->save();
        $category = new Category();
        $category->name = 'HTML';
        $category->save();
        $category = new Category();
        $category->name = 'CSS';
        $category->save();
        $category = new Category();
        $category->name = 'RUBY';
        $category->save();
        $category = new Category();
        $category->name = 'NODE JS';
        $category->save();
    }
}
