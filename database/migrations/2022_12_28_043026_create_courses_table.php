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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
               
            $table->string('title');   
            $table->string('slug')->unique();   
            $table->string('category_id')->nullable();  
            $table->boolean('is_free')->default(false);  
            $table->unsignedBigInteger('priority')->default('10');  
            $table->string('price')->default('0');  
            $table->unsignedFloat('offer_price')->default('0');  
            $table->string('banner')->nullable();  
            $table->string('description')->nullable();  
            $table->string('meta_description')->nullable();  
            $table->string('meta_keyword')->nullable();  
            $table->string('total_view')->default('0');  
            $table->enum('is_popular',['new','offer','limited_time'])->nullable();  
            $table->string('total_enrolled')->default('0');  
            $table->string('avarage_rating')->default('0');  

            $table->string('external_enroll_link')->nullable();  

            $table->date('start_date')->nullable();  
            $table->date('end_date')->nullable();  
            $table->boolean('status')->default(true);  
            
            
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
           

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
        Schema::dropIfExists('courses');
    }
};
