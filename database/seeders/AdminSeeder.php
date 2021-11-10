<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Washington Awala',
            'email' => 'washingtonawala32@gmail.com',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'password' => Hash::make('washingtonawala32@gmail.com'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Ochieng Okumu',
            'email' => 'ochiengokumu@gmail.com',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'password' => Hash::make('ochiengokumu@gmail.com'),
        ]);
    }
}
