<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Category;
use App\Models\Footer;
use App\Models\HeroSection;
use App\Models\Review;
use App\Models\Testimonial;
use App\Models\Tour;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create();
        About::factory()->create([
            'image' => 'about.jpg',
            'description' => 'This is a test description for the about section'
        ]);

        Category::factory()->create([
            'name' => 'Test Category',
            'item' => 'test-category',
            'slug' => 'This is a test category description.',
            'image' => 'category.jpg',
        ]);        

        Testimonial::factory()->create([
            'name' => 'Test User',
            'feedback' => 'this is a test feedbck',
            'image' => 'test.jpg'
        ]);

        Review::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'rating' => 5,
            'review' => 'This is a test review.',
            
        ]);

        Tour::factory()->create([            
            'name' => 'Test User',
            'slug' => 'test-user',
            'description' => 'This is a test description.',
            'price' => 100.00,
            'compare_price' => 120.00,
            'note' => 'Test note',
            'images' => json_encode(['image1.jpg', 'image2.jpg']),
            'category_id' => 1,
        ]);

        Footer::factory()->create([
            'value'    => 'test value',
            'key'   => ' test key',
        ]);

        HeroSection::factory()->create([
            'url'    => 'https://example.com',
            'title'  => 'Test title'

        ]);


    }
}
