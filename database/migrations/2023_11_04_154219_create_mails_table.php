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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('object');
            $table->text('message')->nullable()->default(null);
            $table->string('typecourrier',50);
            $table->string('status',50);
            $table->date('dte');
            $table->unsignedBigInteger('personne_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};