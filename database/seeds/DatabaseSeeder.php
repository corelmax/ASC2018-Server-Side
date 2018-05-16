<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $admin = new \App\AuthModel([
            'username' => 'admin',
            'password' => 'adminpass',
            'role' => 'ADMIN',
            'token' => ''
        ]);
        $admin->save();

        (new \App\AuthModel([
            'username' => 'user1',
            'password' => 'user1pass',
            'role' => 'USER',
            'token' => ''
        ]))->save();

        $user2 = new \App\AuthModel([
            'username' => 'user2',
            'password' => 'user2pass',
            'role' => 'USER',
            'token' => ''
        ]);
        $user2->save();

        (new \App\PlaceModel([
            'name' => 'test',
            'latitude' => 0.0,
            'longitude' => 0.0,
            'x' => 0,
            'y' => 0,
            'image_path' => '',
            'description' => 'test'
        ]))->save();
    }
}
