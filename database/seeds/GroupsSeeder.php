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
            'name' => 'grp-1'
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-2'
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-3'
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-4'
        ]);
        DB::table('groups')->insert([
            'name' => 'grp-5'
        ]);
    }
}
