<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PustakawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pustakawans = [
            [
                'username' => 'pustakawan1',
                'password' => bcrypt('pUSTAKAWAN1'),
                'role' => 'pustakawan',
            ],
            [
                'username' => 'pustakawan2',
                'password' => bcrypt('pUSTAKAWAN2'),
                'role' => 'pustakawan',
            ],
            [
                'username' => 'pustakawan3',
                'password' => bcrypt('pUSTAKAWAN3'),
                'role' => 'pustakwan',
            ]
        ];

        foreach ($pustakawans as $pustakawan) {
            DB::table('pustakawans')->insert([
                'username' => $pustakawan['username'],
                'password' => $pustakawan['password'],
                'role' => $pustakawan['role'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}