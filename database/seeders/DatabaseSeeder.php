<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
        // User::factory(10)->create();
        $faker = Faker::create();
        $now = date("Y-m-d H:i:s");
        DB::table('teams')->insert([
            'user_id' => '1',
            'name' => 'Admin',
            'personal_team' => '1',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('teams')->insert([
            'user_id' => '1',
            'name' => 'Students',
            'personal_team' => '0',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('users')->insert([
            'name' => 'root',
            'birthdate' => null,
            'nationality' => $faker->country,
            'email' => 'root@gmail.com',
            'phone' => $faker->phoneNumber,
            'password' => '$2y$10$ez8Fyn3/6b2C6zrKvAYVBOus3hSoZW0bi/R9546AbH6j/ggAMpHCK',
            'current_team_id' => '1',
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
