<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreadIdColumnInCoinUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coin_used', function (Blueprint $table) {
            $table->unsignedBigInteger('thread_id')->after('used_against_id');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coin_used', function (Blueprint $table) {
            $table->dropColumn('thread_id');
        });
    }
}
