<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->string('name');
            $table->string('fname');
            $table->string('mname');
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('birth_date');
            $table->string('nationality');
            $table->string('blood_group')->nullable();
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('roll')->nullable();
            $table->text('image')->nullable();
            $table->text('education');
            $table->string('ref_name')->nullable();
            $table->string('ref_phone')->nullable();
            $table->string('ref_batch_name')->nullable();
            $table->string('ref_relation')->nullable();
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
        Schema::dropIfExists('students');
    }
}
