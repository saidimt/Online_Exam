<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Exam = DB::table('exam_types')->insert(
            [    'name' => "Quiz",

        ]);
        $Exam = DB::table('exam_types')->insert([
            'name' => "Test",
          
        ]);
        $Exam = DB::table('exam_types')->insert(

        [
            'name' => "Examination",
        
        ]);
    }
}
