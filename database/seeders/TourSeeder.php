<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        Tour::create([
            'name' => 'Paris Adventure',
            'description' => 'A week-long tour of Paris with guided visits to the Eiffel Tower, Louvre, and more.',
            'price' => 1200.00,
            'start_date' => '2025-07-01',
            'end_date' => '2025-07-07',
            'destination' => 'Paris, France',
            'available_spots' => 50,
            'is_star' => true,
            'image' => 'tours/paris.jpg',
        ]);

        Tour::create([
            'name' => 'Tokyo Exploration',
            'description' => 'Explore the vibrant city of Tokyo with cultural tours and modern attractions.',
            'price' => 1500.00,
            'start_date' => '2025-08-01',
            'end_date' => '2025-08-08',
            'destination' => 'Tokyo, Japan',
            'available_spots' => 30,
            'is_star' => false,
            'image' => 'tours/tokyo.jpg',
        ]);
    }
}
