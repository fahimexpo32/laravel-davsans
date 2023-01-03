<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('meta_description')->nullable();  
            $table->string('meta_keyword')->nullable();  
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by');

            $table->string('is_free')->default(true); 
            $table->unsignedInteger('value')->default('0'); 
            
            $table->unsignedBigInteger('course_id');  
            $table->unsignedBigInteger('chapter_id');  
            $table->unsignedBigInteger('priority')->default('10');  
        
            $table->string('banner')->nullable();  
            $table->string('total_view')->default('0');  
            $table->enum('type',['text','video','assingment'])->default('video');  
            $table->enum('label',['beginner','intermediate','advanced'])->default('beginner');  
            $table->string('total_enrolled')->default('0');  
            $table->string('avarage_rating')->default('0');  
            $table->string('status')->default(true);  
            
            $table->string('video_url')->nullable(); 
            $table->string('embadded_url')->nullable(); 


            $table->date('start_date')->nullable();  
            $table->date('end_date')->nullable();  

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('chapter_id')->references('id')->on('chapters');
           
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
        Schema::dropIfExists('lessons');
    }
};
