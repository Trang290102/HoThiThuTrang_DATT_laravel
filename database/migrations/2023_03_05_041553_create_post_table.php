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
        Schema::create('httt_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('topic_id');
            $table->string('title', 1000);
            $table->string('slug', 1000);
            $table->longText('detail');
            $table->string('images', 1000);
            $table->string('type', 100);
            $table->string('metakey', 255);
            $table->string('metadesc', 255);
            $table->unsignedTinyInteger('created_by');
            $table->unsignedTinyInteger('update_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('httt_post');
    }
};
