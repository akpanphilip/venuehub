<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventServiceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_service_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('eventservice');
            $table->string('budget');
            $table->string('capacity');
            $table->string('description');
            $table->string('h1');
            $table->string('h2')->nullable();
            $table->string('h3')->nullable();
            $table->string('image');
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_service_lists');
    }
}
