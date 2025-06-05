<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        Announcement::create([
            'title' => 'New Tours Available!',
            'content' => 'We have added new exciting tours to Paris and Tokyo. Book now to secure your spot!',
        ]);

        Announcement::create([
            'title' => 'Special Discount',
            'content' => 'Get 10% off on all Star Packages booked before July 1, 2025!',
        ]);
    }
}
