<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('metrics', function (Blueprint $table) {
             $table->increments('metric_id');
             $table->string('job_id')->nullable();
             $table->string('user_id')->nullable();
             $table->text('fulltext', 65535)->nullable();
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
         Schema::dropIfExists('metrics');
     }
}
