<?php

use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert(['title' => 'Понедельник']);
        DB::table('days')->insert(['title' => 'Вторник']);
        DB::table('days')->insert(['title' => 'Среда']);
        DB::table('days')->insert(['title' => 'Четверг']);
        DB::table('days')->insert(['title' => 'Пятница']);
        DB::table('days')->insert(['title' => 'Суббота']);
        DB::table('days')->insert(['title' => 'Воскресенье']);
    }
}
