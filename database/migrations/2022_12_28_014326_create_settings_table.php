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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');                   
            $table->string('logo')->nullable();                   
            $table->string('phone_no')->nullable();                   
            $table->string('email')->nullable();                   
            $table->string('open_close_time')->nullable();                   
            $table->string('addrss')->nullable();                   
            $table->string('footer_text')->nullable();                   
            $table->string('labels')->nullable();                   
            $table->string('options')->nullable();                   
           
            
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
        Schema::dropIfExists('settings');
    }
};
