<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('experience_year')->nullable();
            $table->text('address')->nullable();
            $table->string('job_time')->nullable();
            $table->string('job_type')->nullable();
            $table->string('shift')->nullable();
            $table->integer('salary')->nullable();
            $table->text('benefit')->nullable();
            $table->text('file')->nullable();
            $table->string('deadline')->nullable();
            $table->text('note')->nullable();
            $table->text('description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('requirement')->nullable();
            $table->text('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('careers');
    }
}
