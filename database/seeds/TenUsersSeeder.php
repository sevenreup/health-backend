<?php

use Illuminate\Database\Seeder;
use App\User;

class TenUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '000198',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '009802',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '098003',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '008904',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '009805',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '009806',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '098007',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '009808',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '098009',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0009810',
            'password' => bcrypt('password'),
        ]);
    }
}
