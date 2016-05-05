<?php

use Illuminate\Database\Seeder;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DT = new DateTime();
        
        DB::table('periods')->insert([
            'study_form_id' => 1,
            'lesson_number' => 1,
            'start_time' => $DT->setTime(9, 20),
            'end_time' => $DT->setTime(9, 50)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 1,
            'lesson_number' => 2,
            'start_time' => $DT->setTime(9, 55),
            'end_time' => $DT->setTime(10, 25)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 1,
            'lesson_number' => 3,
            'start_time' => $DT->setTime(10, 30),
            'end_time' => $DT->setTime(11, 00)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 1,
            'lesson_number' => 4,
            'start_time' => $DT->setTime(11, 20),
            'end_time' =>$DT->setTime(11, 50)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 1,
            'lesson_number' => 5,
            'start_time' => $DT->setTime(11, 55),
            'end_time' => $DT->setTime(12, 25)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 1,
            'lesson_number' => 6,
            'start_time' => $DT->setTime(12, 30),
            'end_time' => $DT->setTime(13, 00)
        ]);
        //////////////////////////////////////////////
        DB::table('periods')->insert([
            'study_form_id' => 2,
            'lesson_number' => 1,
            'start_time' => $DT->setTime(14, 20),
            'end_time' => $DT->setTime(14, 50)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 2,
            'lesson_number' => 2,
            'start_time' => $DT->setTime(14, 55),
            'end_time' => $DT->setTime(15, 25)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 2,
            'lesson_number' => 3,
            'start_time' => $DT->setTime(15, 30),
            'end_time' => $DT->setTime(16, 00)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 2,
            'lesson_number' => 4,
            'start_time' => $DT->setTime(16, 20),
            'end_time' => $DT->setTime(16, 50)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 2,
            'lesson_number' => 5,
            'start_time' => $DT->setTime(16, 55),
            'end_time' => $DT->setTime(17, 25)
        ]);
        DB::table('periods')->insert([
            'study_form_id' => 2,
            'lesson_number' => 6,
            'start_time' => $DT->setTime(17, 30),
            'end_time' => $DT->setTime(18, 00)
        ]);
    }
}
