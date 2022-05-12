<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ziko el',
            'email' => 'ziko@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'amin el',
            'email' => 'amin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'karim el',
            'email' => 'karim@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
