<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin
        DB::table('admin')->insert([
            'national_id' => '198217281219212',
            'name' => 'Rian Iregho',
            'email' => 'rianiregho@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'phone' => '0813 7617 3959',
        ]);
    }
}
