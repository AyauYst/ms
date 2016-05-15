<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(S_ShedulesSeeder::class);
        $this->call(ShedulesSeeder::class);

        $this->call(DaysSeeder::class);
        $this->call(StudyFormsSeeder::class);
        $this->call(PeriodsSeeder::class);
       
        
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(G_S_Seeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(S_T_Seeder::class);

      

        
    }
}
