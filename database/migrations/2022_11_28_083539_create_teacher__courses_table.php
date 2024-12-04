<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher__courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('teacher_id');
            $table->bigInteger('course_id');
            $table->bigInteger('created_by');
            $table->boolean('still_teach');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher__courses');
    }
}
