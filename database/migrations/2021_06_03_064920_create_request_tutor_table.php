<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_tutors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('location');
            $table->string('phone');
            $table->text('detail');
            $table->string('subject');
            $table->string('grade_level');
            $table->string('help_type');
            $table->string('online_class')->nullable();
            $table->string('class_at_student_place')->nullable();
            $table->string('class_at_tutor_place')->nullable();
            $table->double('budget', 15, 2);
            $table->string('gender_preference');
            $table->string('no_of_tutor');
            $table->string('working_type');
            $table->string('file')->nullable();
            $table->boolean('is_closed')->default(0);
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
        Schema::dropIfExists('request_tutors');
    }
}
