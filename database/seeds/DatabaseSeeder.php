<?php

use Illuminate\Database\Seeder;
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
        $this->call(UserSeeder::class);
        $this->call(TenUsersSeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(QuestionsSeeder::class);

        $path = storage_path('app/geofences.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Fences table seeded!');
    }
}
