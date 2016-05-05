<?php

use Illuminate\Database\Seeder;

class S_ShedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_shedules')->insert([
            'group_id' => 1,
            'is_actual' => true
        ]);

        DB::table('s_shedules')->insert([
            'group_id' => 2,
            'is_actual' => true
        ]);
    }
}
