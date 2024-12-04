<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin__contact_us', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_seen');
            $table->bigInteger('admin_id');
            $table->bigInteger('contactUs_id');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin__contact_us');
    }
}
