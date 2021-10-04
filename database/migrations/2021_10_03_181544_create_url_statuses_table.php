<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_statuses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('url_id');
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
            
            $table->string('status');
            $table->binary('data');
            
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
        Schema::dropIfExists('url_stauses');
    }
}
