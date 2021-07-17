<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name'=> 'Mamdouh Khaled',
            'email'=>'Mamdouh.khaled@live.com',
            'isAdmin'=>1
        ]);
        \App\Models\User::factory()->create([
            'name'=> 'User',
            'email'=>'user@user.com',
            'isAdmin'=>0
        ]);
        \App\Models\User::factory(10)->create();
    }
}
