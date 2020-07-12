<?php

use Illuminate\Database\Seeder;

class JobPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\JobPosition::class,10)->create();
    }
}
