<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin User',
            'email' => 'admin@cosmoline.com',
            'password' => Hash::make('1234wxyz'),
            'type' => 'Super Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
