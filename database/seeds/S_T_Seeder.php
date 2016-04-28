<?php

use Illuminate\Database\Seeder;

class S_T_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects_teachers')->insert([
            'user_id' => 3,
            'subject_id' => 1
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 3,
            'subject_id' => 2
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 3,
            'subject_id' => 3
        ]);

        DB::table('subjects_teachers')->insert([
            'user_id' => 7,
            'subject_id' => 4
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 7,
            'subject_id' => 5
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 7,
            'subject_id' => 6
        ]);

        DB::table('subjects_teachers')->insert([
            'user_id' => 8,
            'subject_id' => 7
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 8,
            'subject_id' => 8
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 8,
            'subject_id' => 9
        ]);

        DB::table('subjects_teachers')->insert([
            'user_id' => 9,
            'subject_id' => 10
        ]);
        DB::table('subjects_teachers')->insert([
            'user_id' => 9,
            'subject_id' => 11
        ]);
    }
}
