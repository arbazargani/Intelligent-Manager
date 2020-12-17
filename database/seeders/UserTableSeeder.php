<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Saeed Khosravi',
            'email' => 'sa.nix868@gmail.com',
            'password' => Hash::make('09356252177@admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alireza bazargani',
            'email' => 'arbazargani1998@gmail.com',
            'password' => Hash::make('adminstrator09308990856'),
        ]);
    }
}
