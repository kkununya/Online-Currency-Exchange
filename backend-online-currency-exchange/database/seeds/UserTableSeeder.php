<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_branch_officer = Role::where('name', 'Branch Officer')->first();
        $role_manager  = Role::where('name', 'Manager')->first();
        $role_admin = Role::where('name', 'Administrator')->first();

        $branch_officer = new User();
        $branch_officer->employee_id = 57928121;
        $branch_officer->name = 'Branch Officer Name';
        $branch_officer->email = 'officer@example.com';
        $branch_officer->password = Hash::make('secret');
        $branch_officer->save();
        $branch_officer->roles()->attach($role_branch_officer);

        $manager = new User();
        $manager->employee_id = 50847368;
        $manager->name = 'Manager Name';
        $manager->email = 'manager@example.com';
        $manager->password = Hash::make('secret');
        $manager->save();
        $manager->roles()->attach($role_manager);        

        $admin = new User();
        $admin->employee_id = 45837294;
        $admin->name = 'Administrator Name';
        $admin->email = 'Administrator@example.com';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}