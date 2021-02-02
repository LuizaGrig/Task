<?php

use Illuminate\Database\Seeder;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'id' => '1',
                'title' => 'Task 1',
                'description' => 'You should create a login page within two days'
            ],
        [
                'id' => '2',
                'title' => 'Task 2',
                'description' => 'You should add different roles for users'
        ],
            [
                'id' => '3',
                'title' => 'Task 3',
                'description' => 'You should assign tasks in users'
            ]
        ]);
    }
}
