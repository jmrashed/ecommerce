<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker
        $faker = Faker::create();

        // Array to hold the categories
        $categories = [];

        // Define some top-level categories
        $topLevelCategories = [
            'Electronics',
            'Fashion',
            'Home & Garden',
            'Sports & Outdoors',
            'Health & Beauty',
            'Toys & Games',
            'Automotive',
            'Books & Media'
        ];

        // Add top-level categories
        foreach ($topLevelCategories as $categoryName) {
            $categories[] = [
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'description' => $faker->sentence,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ];
        }

        // Insert the top-level categories and get their IDs
        DB::table('pkg_categories')->insert($categories);
        $topLevelCategoryIds = DB::table('pkg_categories')->whereNull('parent_id')->pluck('id', 'name')->toArray();

        // Clear the categories array for subcategories
        $categories = [];

        // Define some subcategories for each top-level category
        $subcategories = [
            'Electronics' => ['Mobile Phones', 'Laptops', 'Cameras', 'Televisions', 'Headphones'],
            'Fashion' => ['Men\'s Clothing', 'Women\'s Clothing', 'Shoes', 'Jewelry', 'Accessories'],
            'Home & Garden' => ['Furniture', 'Kitchen Appliances', 'Decor', 'Garden Tools', 'Bedding'],
            'Sports & Outdoors' => ['Exercise Equipment', 'Outdoor Gear', 'Sportswear', 'Cycling', 'Fishing'],
            'Health & Beauty' => ['Skincare', 'Makeup', 'Health Supplements', 'Hair Care', 'Personal Care'],
            'Toys & Games' => ['Action Figures', 'Board Games', 'Puzzles', 'Outdoor Toys', 'Video Games'],
            'Automotive' => ['Car Accessories', 'Motorcycle Parts', 'Car Electronics', 'Tires', 'Tools'],
            'Books & Media' => ['Fiction', 'Non-Fiction', 'Magazines', 'E-books', 'Music']
        ];

        // Add subcategories
        foreach ($subcategories as $parentName => $subCatNames) {
            $parentId = $topLevelCategoryIds[$parentName];
            foreach ($subCatNames as $subCatName) {
                $categories[] = [
                    'name' => $subCatName,
                    'slug' => Str::slug($subCatName),
                    'description' => $faker->sentence,
                    'parent_id' => $parentId,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => null
                ];
            }
        }

        // Insert the subcategories
        DB::table('pkg_categories')->insert($categories);
    }
}
