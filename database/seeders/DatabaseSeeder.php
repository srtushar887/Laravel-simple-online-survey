<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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

        $faker = Faker::create();

        foreach (range(1,200) as $index)
        {
//            DB::table('survey_questions')->insert([
//                'user_type' => 2,
//                'user_id' => rand(3,5),
//                'title' => $faker->paragraph,
//                'question' => $faker->paragraph,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]);


            DB::table('users')->insert([
                'balance' => 0.00,
                'total_income' => 0.00,
                'my_ref_id' => rand(0000,9999),
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'is_veify' => rand(1,2),
                'account_type' => rand(1,2),
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }


    }
}
