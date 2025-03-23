<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CitySeeder::class,
            ProductSeeder::class,
            LandSeeder::class,
            CategoryBlogSeeder::class,
            PostSeeder::class,
            PartnerSeeder::class,
            TestimonialSeeder::class,
            AboutSeeder::class,
            ValuesSeeder::class,
            WhyChooseUsSeeder::class,
            HeroSliderSeeder::class,
            SettingsSeeder::class,
            CompanySeeder::class,
        ]);
    }
}
