<?php

use Illuminate\Database\Seeder;

class SubscriptionPansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\SubscriptionPlan::class, 10)->create();
    }
}
