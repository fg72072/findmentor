<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequirementIdColumnInCoinUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coin_used', function (Blueprint $table) {
            $table->unsignedBigInteger('requirement_id')->after('user_id');
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
            $table->dropColumn('requirement_id');
        });
    }
}
