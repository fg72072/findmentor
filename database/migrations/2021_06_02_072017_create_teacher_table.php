<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->string('type')->nullable();
            $table->string('current_role')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('profile')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('fee_charge')->nullable();
            $table->double('min_fee', 15,2)->nullable();
            $table->double('max_fee', 15, 2)->nullable();
            $table->string('fee_detail')->nullable();
            $table->double('total_experience', 15, 2)->nullable();
            $table->double('total_experience_online_offline', 15, 2)->nullable();
            $table->double('total_experience_online', 15, 2)->nullable();
            $table->string('travel_to_student')->nullable();
            $table->string('online_available')->nullable();
            $table->string('digital_pen')->nullable();
            $table->string('help_with')->nullable();
            $table->string('full_time_employee')->nullable();
            $table->string('interested_in')->nullable();
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
        Schema::dropIfExists('teacher_detail');
    }
}
