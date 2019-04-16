<?php

use App\Alias;
use Illuminate\Database\Seeder;

class AliasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alias::firstOrCreate(
            [
                'source_username' => 'postmaster',
                'source_domain' => 'localhost',
                'destination_username' => 'root',
                'destination_domain' => 'localhost',
            ],
            [
                'enabled' => true,
            ]
        );
    }
}
