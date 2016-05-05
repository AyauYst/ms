<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'grp-1',
            'study_form_id' => 1
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-2',
            'study_form_id' => 2
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-3',
            'study_form_id' => 1
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-4',
            'study_form_id' => 2
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-5',
            'study_form_id' => 1
        ]);
    }
}
