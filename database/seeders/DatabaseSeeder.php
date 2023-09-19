<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\User;
use App\Models\Post;
use Hash;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Uchquduq',
        //     'email' => 'Uchquduq24',
        //     'password' => Hash::make('zzzz1111*'),
        // ]);


        // Post::create([
        //     'post_name' => 'Name',
        //     'post_desc' => 'Name',
        //     'post_type' => 'photo',
        //     'post_img' => 'strelok',
        // ]);
    }
}

