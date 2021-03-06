<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = factory(App\User::class, 10)->create();

        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0001',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0002',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0003',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0004',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0005',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0006',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0007',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0008',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '0009',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => '00010',
            'password' => bcrypt('password'),
        ]);
    }
}
