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
        Schema::create('httt_config', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 1000);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('address', 255);
            $table->string('author', 255);
            $table->string('metakey', 255);
            $table->string('metadesc', 255);
            $table->unsignedTinyInteger('status');
            $table->timestamps();
          
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('httt_config');
    }
};
