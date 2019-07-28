<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@test.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Saipers',
                'email' => 'admin@test.com',
                'role' => 'admin',
                'password' =>  Hash::make(123456)
            ]);
        }
    }
}
