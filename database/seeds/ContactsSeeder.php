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
            'sender' => 7,
            'recipient' => 8,
            'status' => 'pending',
        ]);
        ContactTraceUser::create([
            'sender' => 8,
            'recipient' => 9,
            'status' => 'rejected',
        ]);
        ContactTraceUser::create([
            'sender' => 9,
            'recipient' => 10,
            'status' => 'accepted',
        ]);
        ContactTraceUser::create([
            'sender' => 7,
            'recipient' => 11,
            'status' => 'rejected',
        ]);
        ContactTraceUser::create([
            'sender' => 7,
            'recipient' => 12,
            'status' => 'accepted',
        ]);
        ContactTraceUser::create([
            'sender' => 7,
            'recipient' => 13,
            'status' => 'pending',
        ]);
        ContactTraceUser::create([
            'sender' => 11,
            'recipient' => 12,
            'status' => 'pending',
        ]);

    }
}
