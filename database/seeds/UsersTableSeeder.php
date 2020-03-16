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
        User::create([
            'name' => 'Alya',
            'email' => 'alya@gmail.com',
            'id_role' => '1',
            'password' => bcrypt('alyamu'),
            'status' => true,
        ]);

        User::create([
            'name' => 'Stitia',
            'email' => 'stitia@gmail.com',
            'id_role' => '2',
            'password' => bcrypt('stitia'),
            'status' => true,
        ]);

        User::create([
            'name' => 'Ranti',
            'email' => 'ranti@gmail.com',
            'id_role' => '3',
            'password' => bcrypt('ranti'),
            'status' => true,
        ]);
    }
}
