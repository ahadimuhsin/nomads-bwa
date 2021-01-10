<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Muhsin Ahadi',
            'username' => 'muhsinahadi',
            'email' => 'muhsinahadi@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'ADMIN'
        ]);
    }
}
