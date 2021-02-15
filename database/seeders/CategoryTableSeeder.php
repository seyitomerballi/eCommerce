<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::toBase()->truncate();
        $categoryRecords = [
            [
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'T-Shirts',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'slug' =>'t-shirts',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ],
            [
                'parent_id' => 1,
                'section_id' => 1,
                'category_name' => 'Casual T-Shirts',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'slug' =>'casual-t-shirts',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ],
            [
                'parent_id' => 1,
                'section_id' => 1,
                'category_name' => 'Formal T-Shirts',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'slug' =>'formal-t-shirts',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ],
            [
                'parent_id' => 2,
                'section_id' => 1,
                'category_name' => 'Red Casual T-Shirts',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'slug' =>'red-casual-t-shirts',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ],
            [
                'parent_id' => 2,
                'section_id' => 1,
                'category_name' => 'Blue Casual T-Shirts',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'slug' =>'blue-casual-t-shirts',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ],
            [
                'parent_id' => 3,
                'section_id' => 1,
                'category_name' => 'Blue Formal T-Shirts',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'slug' =>'blue-formal-t-shirts',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ]
        ];

        Category::toBase()->insert($categoryRecords);
    }
}
