<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'anhvt', 'email'=>'anhvt@gmail.com', 'password'=>bcrypt('matkhau')],
            ['name'=>'vanbinh', 'email'=>'vanbinh@gmail.com', 'password'=>bcrypt('matkhau')],
            ['name'=>'vanthanh', 'email'=>'vanthanh@gmail.com', 'password'=>bcrypt('matkhau')]
        ]);
    }

}


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
    }
}

