<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'Branch Officer';
        $role_employee->description = 'A Branch Officer User';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'Manager';
        $role_manager->description = 'A Manager User';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Administrator';
        $role_manager->description = 'An Administrator User';
        $role_manager->save();
    }
}
