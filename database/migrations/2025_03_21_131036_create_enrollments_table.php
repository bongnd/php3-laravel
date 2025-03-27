<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('id'); // Cột id của bảng enrollments
            $table->unsignedInteger('student_id'); // Sử dụng unsignedInteger
            $table->unsignedInteger('course_id'); // Sử dụng unsignedInteger
            $table->timestamp('enrolled_at')->useCurrent();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
