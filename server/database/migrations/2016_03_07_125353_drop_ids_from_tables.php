<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropIdsFromTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('seat_id');
        });

        Schema::table('seats', function (Blueprint $table) {
            $table->dropColumn('booking_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function(Blueprint $table) {
            $table->integer('seat_id')->unsigned()->index();
        });
        
        Schema::table('seats', function(Blueprint $table) {
            $table->integer('booking_id')->unsigned()->index();
        });

    }
}
