<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tasks');
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('cmd')->default('');
            $table->string('cron')->default('');
            $table->integer('host_id')->default(0);
            $table->integer('cycle')->default(0);
            $table->integer('timeout')->default(0);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('next_time')->nullable();
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
        //
    }
}
