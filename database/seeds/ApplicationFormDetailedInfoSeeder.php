<?php

use Illuminate\Database\Seeder;

class ApplicationFormDetailedInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ApplicationDetail::class,10)->create();
    }
}
