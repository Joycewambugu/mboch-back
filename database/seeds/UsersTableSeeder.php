<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('email', 'morrismukiri@hotmail.com')->delete();
        DB::table('users')->insert([
            'name' => "Morris Mukiri",
            'email' => "morrismukiri@hotmail.com",
            'phone' => "+254716043576",
            'password' => bcrypt('password123'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);
        factory(\App\User::class, 10)->create();
    }
}
