<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerappliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careerapplies', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('career_id')->nullable();
            // $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->unsignedBigInteger('career_id')->nullable();
            // $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->integer('expect_salary')->nullable();
            $table->text('image')->nullable();
            $table->text('file')->nullable();
            $table->text('status')->default(1);
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
        Schema::dropIfExists('careerapplies');
    }
}
