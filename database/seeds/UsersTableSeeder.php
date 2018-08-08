<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        App\User::create([
            'name' => 'King Joel',
            'email' => 'admin@example.com',
            'password' => Hash::make('12King34'),

        ]);

        factory(\App\User::class,3)->create();
    }
}
