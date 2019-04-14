<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTlspoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('tlspolicies')) {
            // There is no mail server setup present. We'll create all necessary tables.
            Schema::create('tlspolicies', function (Blueprint $table) {
                $table->integer('id')->unsigned()->autoIncrement();
                $table->string('domain', 255)->unique();
                $table->enum('policy', ['none', 'may', 'encrypt', 'dane', 'dane-only', 'fingerprint', 'verify', 'secure'])->default('encrypt');
                $table->string('params', 255)->default('');
                $table->timestamps();
            });
        } else {
            // There is an existing mail server setup, so just add some columns.
            Schema::table('tlspolicies', function(Blueprint $table) {
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Just drop the Post Office specific columns, but keep the basic mail server setup.
        Schema::table('tlspolicies', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
