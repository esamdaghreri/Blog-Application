<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'administrator';
        $role->save();
        $role = new Role();
        $role->name = 'author';
        $role->save();
        $role = new Role();
        $role->name = 'subsicriber';
        $role->save();
        $role = new Role();
        $role->name = 'public';
        $role->save();
    }
}
