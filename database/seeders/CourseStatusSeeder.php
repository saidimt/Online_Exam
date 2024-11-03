<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CourseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run(): void
        {
            $status=[
                'Active',
                'Ended',
            ];
            foreach ($status as $value) {
                
            DB::table('course_statuses')->insert(
                [    'status' => $value,
            ]);
        }
        //
        }
}
