<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'id' => 1,
            'name' => 'North-East Group'
        ]);

        DB::table('users')->insert([
            'name' => "admin",
            'email' => "bless@titrias.com",
            'password' => bcrypt('password'),
            'type' => 'leader',
            'active' => 1,
            'group_id' => 1
        ]);
    }
}
