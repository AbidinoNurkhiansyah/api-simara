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
        Schema::create('wakafs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jenis_properti'); // 'Tanah' or 'Bangunan'
            $table->string('luas'); // flexible: "500 m²", "0.5 Ha", etc.
            $table->string('nadzir'); // pengelola wakaf
            $table->text('address');
            $table->text('map_embed')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            // Index for common query patterns
            $table->index(['jenis_properti']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wakafs');
    }
};
