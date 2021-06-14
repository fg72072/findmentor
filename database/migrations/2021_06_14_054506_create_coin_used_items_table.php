<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinUsedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_used_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_used_id');
            $table->unsignedBigInteger('requirement_id');
            $table->integer('no_of_used_coins');
            $table->string('subject');
            $table->boolean('coin_utilize_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_used_items');
    }
}
