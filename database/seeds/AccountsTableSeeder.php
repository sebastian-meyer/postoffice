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
        $root = Account::firstOrNew(
            [
                'username' => 'root',
                'domain' => 'localhost',
            ],
            [
                'quota' => 0,
                'enabled' => true,
                'sendonly' => false,
            ]
        );
        // Set new password only if record doesn't exist.
        if (! $root->exists) {
            $root->password = Hash::make('p4$$w0rd'); // Change this!
        }
        $root->save();
    }
}
