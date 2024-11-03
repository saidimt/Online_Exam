<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class GeneralStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run(): void
        {
            $status=[
                'Active',
                'Disabled',
                'Yes',
                'No',
                'In Progress',
                'Partial',
                'Completed',
            ];
            foreach ($status as $value) {
                
            DB::table('course_statuses')->insert(
                [    'status' => $value,
    
            ]);
        }
        //
        }
}
