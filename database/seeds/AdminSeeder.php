<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') ->insert([
            'id' => '5',
            'name' => 'Jane',
            'email' => 'jane@gmail.com',
            'password' => '987654321',
            'role' => 'admin',
        ]);
    }
}
