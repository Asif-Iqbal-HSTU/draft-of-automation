<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('CourseTitle');
            $table->string('Department');
            $table->string('Number');
            $table->string('CourseCode')->nullable();            
            $table->string('Degree');          
            $table->string('Credit');          
            $table->string('ContactHourPerWeek');          
            $table->string('Level');          
            $table->string('Semester');         
            $table->string('AcademicSession');          
            $table->string('Type');  
            $table->string('Type_T_S'); 
            $table->string('TotalMarks')->nullable();   
            $table->string('Instructor')->nullable(); 
            $table->text('Prerequisites'); 
            $table->text('Summary'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
