<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('name')->default(0);
            $table->string('duration')->nullable();
            $table->timestamp('exam_date')->nullable();
            $table->timestamp('exam_end_date')->nullable();
            $table->boolean('student_status')->default(0);
            $table->boolean('status')->default(0);;
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
        Schema::dropIfExists('exams');
    }
}
