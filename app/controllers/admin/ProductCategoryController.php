<?php


namespace App\Controllers\Admin;


use App\Model\Category;

class ProductCategoryController
{
    public function show()
    {
       $categories = Category::all();
       var_dump($categories);
    }

    public function store()
    {
        echo __METHOD__;
    }

}