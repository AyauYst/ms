<?php

use Illuminate\Database\Seeder;

class G_S_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups_students')->insert([
            'group_id' => 1,
            'student_id' => 2
        ]);
        DB::table('groups_students')->insert([
            'group_id' => 2,
            'student_id' => 4
        ]);
        DB::table('groups_students')->insert([
            'group_id' => 3,
            'student_id' => 5
        ]);
        DB::table('groups_students')->insert([
            'group_id' => 4,
            'student_id' => 6
        ]);
    }
}
