<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        User::create([
            'fname' => 'admin',
            'lname' => 'admin',
            'mname' => 'admin',
            'level' => '3',
        	'name' => 'admin',
        	'email' => 'johnirvinudang@gmail.com',
        	'password' => bcrypt('qwerty')
        	]);
    }
}
