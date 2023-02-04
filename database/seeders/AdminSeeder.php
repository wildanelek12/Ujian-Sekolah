<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'nama'  => 'admin',
            'induk' => '01012023',
            'role'  => 1,
            'password'  => bcrypt('admin2023')
        ]);
    }
}
