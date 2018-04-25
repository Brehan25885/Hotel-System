<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class add_to_roles_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [

            'admin',
 
            'client',
 
            'manager',
 
            'receptionist'
 
         ];
 
 
         foreach ($roles as $role) {
 
              Role::create(['name' => $role]);
 
         }
       
    }
}
