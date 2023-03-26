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
        Schema::create('httt_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('link', 1000);
            $table->unsignedInteger('table_id');
            $table->string('type', 100);
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('httt_menu');
    }
};
