<?php

use Illuminate\Database\Seeder;
use App\contactTraceUser;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactTraceUser::create([
            'sender' => 1,
            'recipient' => 2,
            'status' => 'pending',
        ]);
        ContactTraceUser::create([
            'sender' => 2,
            'recipient' => 3,
            'status' => 'rejected',
        ]);
        ContactTraceUser::create([
            'sender' => 3,
            'recipient' => 4,
            'status' => 'accepted',
        ]);
        ContactTraceUser::create([
            'sender' => 1,
            'recipient' => 3,
            'status' => 'rejected',
        ]);
        ContactTraceUser::create([
            'sender' => 1,
            'recipient' => 4,
            'status' => 'accepted',
        ]);
        ContactTraceUser::create([
            'sender' => 4,
            'recipient' => 5,
            'status' => 'pending',
        ]);
        ContactTraceUser::create([
            'sender' => 4,
            'recipient' => 6,
            'status' => 'pending',
        ]);

    }
}
