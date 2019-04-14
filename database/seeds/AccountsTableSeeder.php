<?php

use App\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::firstOrCreate([
            'username' => 'root',
            'domain' => 'localhost',
            'password' => Hash::make('password'),
        ]);
    }
}
