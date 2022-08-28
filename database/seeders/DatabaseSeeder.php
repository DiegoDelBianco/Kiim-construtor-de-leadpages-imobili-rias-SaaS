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
        DB::table('users')->insert([
            'name' => "Diego Del Bianco",
            'email' => 'diego@delbianco.emp.br',
            'password' => '$2y$10$LRgXaF6sehhsXZJ6bmzl6eGTwzuZyg27mzKz2sVkmpUCwNp.e6RHC',
            'type_doc' => 'f',
            'doc' => '401.543.918-08',
            'phone' => '(11) 99993-3857',
            'status' => '1',
            'admin' => '1'
        ]);
        DB::table('site_templates')->insert([
            'name' => "Default",
            'type' => "1",
        ]);
        DB::table('leadpage_templates')->insert([
            'name' => "Default",
        ]);
        DB::table('property_types')->insert([
            'name' => "Casa",
        ]);
        DB::table('property_types')->insert([
            'name' => "Apartamento",
        ]);
        /*DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);*/
    }
}
