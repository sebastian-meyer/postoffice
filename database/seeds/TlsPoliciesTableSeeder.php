<?php

use App\TlsPolicy;
use Illuminate\Database\Seeder;

class TlsPoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TlsPolicy::firstOrCreate([
            'domain' => 'bund.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'email.de',
            'policy' => 'secure',
            'params' => 'match=.web.de',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'freenet.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'gmail.com',
            'policy' => 'secure',
            'params' => 'match=.google.com',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'googlemail.com',
            'policy' => 'secure',
            'params' => 'match=.google.com',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'gmx.at',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'gmx.ch',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'gmx.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'gmx.net',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'mail.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'mailbox.org',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'outlook.com',
            'policy' => 'secure',
            'params' => 'match=.outlook.com',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'posteo.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 't-online.de',
            'policy' => 'secure',
            'params' => 'match=.t-online.de',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'unitymedia.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'web.de',
            'policy' => 'dane-only',
            'params' => '',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'yahoo.com',
            'policy' => 'secure',
            'params' => 'match=.yahoodns.net',
        ]);

        TlsPolicy::firstOrCreate([
            'domain' => 'yahoo.de',
            'policy' => 'secure',
            'params' => 'match=.yahoodns.net',
        ]);
    }
}
