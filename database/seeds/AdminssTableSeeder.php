<?php

use Illuminate\Database\Seeder;

class AdminssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin2',
            'email' => 'admins@admin.com',
            'password' =>1234567,
        ]);
    }
}
