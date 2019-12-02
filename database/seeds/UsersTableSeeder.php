<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
            'email'=>'suelen@email.com',
            'password'=>bcrypt('12345678'),
        ]);
        factory(User::class,10)->create();
    }
}
