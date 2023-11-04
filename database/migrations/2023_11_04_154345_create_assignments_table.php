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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personne_id')->nullable()->default(null);
            $table->unsignedBigInteger('mail_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('no action');
            $table->foreign('mail_id')->references('id')->on('mails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};