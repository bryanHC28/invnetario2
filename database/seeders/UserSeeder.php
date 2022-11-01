<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    User::create([
        'name'=> 'Bryan Hilario Carrasco',
        'email'=> 'bryyan28@hotmail.com',
        'password'=> bcrypt('12345678')


    ])->assignRole('Admin');

    User::create([
        'name'=> 'Demo Pilot',
        'email'=> 'demopilot@hotmail.com',
        'password'=> bcrypt('12345678')


    ])->assignRole('Supervisor');



    }
}
