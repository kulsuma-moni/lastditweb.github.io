<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepreneursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrepreneurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('quote')->nullable();
            $table->string('profession');
            $table->text('expert_in')->nullable();
            $table->text('career_obj')->nullable();
            $table->string('experience_year')->nullable();
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->text('link')->nullable();
            $table->text('meta_tag')->nullable();
            $table->integer('status')->default(1);
            
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
        Schema::dropIfExists('entrepreneurs');
    }
}
