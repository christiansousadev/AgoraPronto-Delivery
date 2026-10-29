<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'id' => 1,
            'f_name' => 'Christian',
            'l_name' => 'Sousa',
            'phone' => '85994029928',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'image' => 'def.png',
            'password' => bcrypt(12345678),
            'remember_token' =>Str::random(10),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
