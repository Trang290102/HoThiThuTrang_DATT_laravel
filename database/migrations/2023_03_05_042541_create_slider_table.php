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
        Schema::create('httt_slider', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('link',1000);
            $table->unsignedInteger('sort_order');
            $table->string('image',1000);
            $table->string('position',255);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('httt_slider');
    }
};
