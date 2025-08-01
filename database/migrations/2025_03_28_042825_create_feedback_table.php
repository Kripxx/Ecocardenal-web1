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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->string('sentiment');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
    
};
