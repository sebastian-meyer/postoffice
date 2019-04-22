<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('domains')) {
            // There is no mail server setup present. We'll create all necessary tables.
            Schema::create('domains', function (Blueprint $table) {
                $table->integer('id')->unsigned()->autoIncrement();
                $table->string('domain', 190)->unique();
                $table->timestamps();
                $table->engine = 'InnoDB';
            });
        } else {
            // There is an existing mail server setup, so just add some columns.
            Schema::table('domains', function(Blueprint $table) {
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
        Schema::table('domains', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
