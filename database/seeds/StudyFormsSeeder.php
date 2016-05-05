<?php

use Illuminate\Database\Seeder;

class StudyFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_forms')->insert(['title' => 'Первая смена']);
        DB::table('study_forms')->insert(['title' => 'Вторая смена']);
    }
}
