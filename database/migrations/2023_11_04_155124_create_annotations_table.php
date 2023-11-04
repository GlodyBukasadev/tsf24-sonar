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
        Schema::create('annotations', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable()->default(null);
            $table->date('dte');
            $table->unsignedBigInteger('employee_id')->nullable()->default(null);
            $table->unsignedBigInteger('recommendation_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('recommendation_id')->references('id')->on('recommendations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annotations');
    }
};