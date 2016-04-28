<?php

use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Математика'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Английский язык'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Логика'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Развитие речи'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Грамота'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Скорочтение'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Хочу все знать'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Письмо'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Творчество'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Казахский язык'
        ]);
        DB::table('subjects')->insert([
            'name' => 'IT'
        ]);
    }
}
