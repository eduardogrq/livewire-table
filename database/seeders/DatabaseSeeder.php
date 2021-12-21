<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        Post::factory(100)->create();
        DB::table('users')->insert([
            'name' => 'Eduardo Quiñonez',
            'email' => 'eduardo.gromeroq@gmail.com',
            'password' => Hash::make('@password'),
        ]);
    }
}
