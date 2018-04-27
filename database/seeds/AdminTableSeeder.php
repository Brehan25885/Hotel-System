<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin1',
            'email' => 'admin@admin.com',
            'password' =>Hash::make(123456),
        ]);
     
        User::create([
            'name' => 'admin1',
            'email' => 'admin@admin.com',
            'password' =>Hash::make(123456),
        ])->assignRole('admin');
    }
}
