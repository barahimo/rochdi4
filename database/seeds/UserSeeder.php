<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1, 
            'name' => 'itic-solution', 
            'email' => 'contact@itic-solution.com', 
            'email_verified_at' => NULL, 
            'password' => '$2y$10$Rs/gdvmdP5UwoUMj/Anc7usSLbjOYofR/ATkbpv8fwCAo6RO6dzE.', 
            'remember_token' => 'RN7Z48nhQBQFqNr15p7jqNqwCDDS3sylmGyKYRpDmeVweMkWGLqH2S6OFa86', 
            'is_admin' => 2, 
            'status' => 1, 
            'permission' => '\'\'', 
            'user_id' => 1, 
            'created_at' => '2021-10-16 10:00:00', 
            'updated_at' => '2021-10-16 11:00:00'
        ]);
    }
}
