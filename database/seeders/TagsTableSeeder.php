<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Predefined list of realistic e-commerce tags
        $tags = [
            'Sale', 'Discount', 'New Arrival', 'Bestseller', 'Limited Edition', 'Exclusive', 'Trending',
            'Popular', 'Top Rated', 'Featured', 'Clearance', 'Special Offer', 'Gift', 'Bundle', 'Combo',
            'Premium', 'Eco-friendly', 'Organic', 'Handmade', 'Luxury', 'Vintage', 'Classic', 'Modern',
            'Smart', 'Portable', 'Innovative', 'Advanced', 'Essential', 'Stylish', 'Comfortable',
            'Durable', 'Lightweight', 'Compact', 'Affordable', 'High Quality', 'Latest', 'Fashionable',
            'Chic', 'Elegant', 'Sporty', 'Casual', 'Formal', 'Professional', 'Outdoor', 'Indoor',
            'Seasonal', 'Holiday', 'Festive', 'Birthday', 'Anniversary', 'Wedding', 'Party',
            'Travel', 'Adventure', 'Fitness', 'Health', 'Beauty', 'Wellness', 'Grooming', 'Pet',
            'Tech', 'Gadget', 'Electronics', 'Home', 'Kitchen', 'Garden', 'Office', 'School',
            'Baby', 'Kids', 'Teen', 'Adult', 'Men', 'Women', 'Unisex', 'Accessories', 'Jewelry',
            'Footwear', 'Clothing', 'Apparel', 'Toys', 'Games', 'Books', 'Music', 'Movies',
            'Entertainment', 'Hobby', 'Craft', 'Art', 'Automotive', 'Tools', 'Hardware',
            'Software', 'Digital', 'Downloadable', 'Subscription', 'Membership'
        ];

        // Array to hold the tags with timestamps
        $tagRecords = [];
        foreach ($tags as $tag) {
            $tagRecords[] = [
                'name' => $tag,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Insert the data into the pkg_tags table
        DB::table('pkg_tags')->insert($tagRecords);





        // Fetch all product IDs and tag IDs
        $productIds = DB::table('pkg_products')->pluck('id')->toArray();
        $tagIds = DB::table('pkg_tags')->pluck('id')->toArray();

        // Array to hold the product-tag associations
        $productTagRecords = [];

        // Initialize Faker
        $faker = Faker::create();

        // Assign random tags to products
        foreach ($productIds as $productId) {
            // Choose a random number of tags for each product (between 1 and 5)
            $numTags = $faker->numberBetween(1, 5);

            // Shuffle the tag IDs and select the first $numTags tags
            $selectedTagIds = $faker->randomElements($tagIds, $numTags);

            foreach ($selectedTagIds as $tagId) {
                $productTagRecords[] = [
                    'product_id' => $productId,
                    'tag_id' => $tagId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert the data into the pkg_product_tag table
        DB::table('pkg_product_tag')->insert($productTagRecords);
    }
}
