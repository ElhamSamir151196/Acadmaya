<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionAttachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session__attaches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('session_id');
            $table->uuid('uuid')->nullable();
            $table->string('cover')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session__attaches');
    }
}
