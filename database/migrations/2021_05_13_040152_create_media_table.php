<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('dataset_id')->nullable();
            $table->string('source')->nullable();
            $table->string('uid')->nullable();
            $table->string('name_upload')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_name')->nullable();
//            $table->json('thumbs')->nullable();
            $table->integer('view')->nullable();
            $table->string('stage')->nullable();
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
        Schema::dropIfExists('media');
    }
}
