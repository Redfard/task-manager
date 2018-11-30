<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

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
            'name' => 'Alex',
            'email' => 'admin@demo.ru',
            'password' => Hash::make('secret'),
        ]);
    }
}
