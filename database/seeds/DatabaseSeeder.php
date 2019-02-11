<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTable::class);
        $this->call(DefaultPhoto::class);
        $this->call(Categories::class);
    }
}
