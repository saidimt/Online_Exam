<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            
            LaratrustSeeder::class,
            ExamTypeSeeder::class,
            CourseStatusSeeder::class,
            GeneralStatusSeeder::class,
            // IntakeStatusSeeder::class,
            // UserStatusSeeder::class,
            // ExamStatusSeeder::class,
            // ResultStatusSeeder::class,
            ExamTypeSeeder::class,
        
        ]);
    }
}
