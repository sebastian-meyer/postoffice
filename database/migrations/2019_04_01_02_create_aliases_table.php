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
                $table->string('source')->virtualAs('CONCAT(`source_username`, "@", `source_domain`)')->nullable()->index();
                $table->string('destination_username', 64);
                $table->string('destination_domain', 190);
                $table->string('destination')->virtualAs('CONCAT(`destination_username`, "@", `destination_domain`)')->nullable()->index();
                $table->boolean('enabled')->default(true);
                $table->timestamps();
                $table->unique(['source_username', 'source_domain', 'destination_username', 'destination_domain']);
                $table->foreign('source_domain')->references('domain')->on('domains');
            });
        } else {
            if (Schema::hasColumn('aliases', 'source_username')
                && Schema::hasColumn('aliases', 'source_domain')
                && Schema::hasColumn('aliases', 'destination_username')
                && Schema::hasColumn('aliases', 'destination_domain')) {
                    // There is an existing mail server setup, so just add some columns and indexes.
                    Schema::table('aliases', function(Blueprint $table) {
                        $table->string('source')->virtualAs('CONCAT(`source_username`, "@", `source_domain`)')->nullable()->index();
                        $table->string('destination')->virtualAs('CONCAT(`destination_username`, "@", `destination_domain`)')->nullable()->index();
                        $table->timestamps();
                    });
            } else {
                // The database schema is not compatible with Post Office.
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Just drop the Post Office specific columns and indexes, but keep the basic mail server setup.
        Schema::table('aliases', function (Blueprint $table) {
            $table->dropIndex(['source', 'destination']);
            $table->dropColumn(['source', 'destination']);
            $table->dropTimestamps();
        });
    }
}
