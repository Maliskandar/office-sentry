<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Pak kabag urdal',
                'email' => 'kabag@gmail.com',
                'role' => 'kabag_urdal',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Pak Pengawas',
                'email' => 'pengawas@gmail.com',
                'role' => 'pengawas',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Pak Office Boy',
                'email' => 'officeboy@gmail.com',
                'role' => 'office_boy',
                'password' => bcrypt('123456')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}