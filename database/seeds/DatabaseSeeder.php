<?php

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        // $this->call(UserSeeder::class);

        $path = storage_path('app/fencesql.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Fences table seeded!');
    }
}
