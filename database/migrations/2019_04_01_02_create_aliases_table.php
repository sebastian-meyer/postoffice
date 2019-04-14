<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAliasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('aliases')) {
            // There is no mail server setup present. We'll create all necessary tables.
            Schema::create('aliases', function (Blueprint $table) {
                $table->integer('id')->unsigned()->autoIncrement();
                $table->string('source_username', 64);
                $table->string('source_domain', 190);
                $table->string('destination_username', 64);
                $table->string('destination_domain', 190);
                $table->boolean('enabled')->default(true);
                $table->timestamps();
                $table->unique(['source_username', 'source_domain', 'destination_username', 'destination_domain'], 'source_destination');
                $table->foreign('source_domain')->references('domain')->on('domains');
            });
        } else {
            // There is an existing mail server setup, so just add some columns.
            Schema::table('aliases', function(Blueprint $table) {
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
        Schema::table('aliases', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
