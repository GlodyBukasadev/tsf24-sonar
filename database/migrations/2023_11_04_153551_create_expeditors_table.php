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
        Schema::create('expeditors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 100);
            $table->unsignedBigInteger('personne_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expeditors');
    }
};
