<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'role_id' => 1,
                    'is_active' => 1,
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('AdminBlog'),
                    'created_at' => date("Y-m-d H:i:s", rand(1262055681,1334567899)),
                    'updated_at' => date("Y-m-d H:i:s", rand(1262055681,1334567899)),
                ],
            ]
        );
    }
}