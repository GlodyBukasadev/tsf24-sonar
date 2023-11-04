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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('priority',50);
            $table->date('dte');
            $table->unsignedBigInteger('purpose_id')->nullable()->default(null);
            $table->unsignedBigInteger('mail_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->unsignedBigInteger('employee_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('purpose_id')->references('id')->on('purposes')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('no action');
            $table->foreign('mail_id')->references('id')->on('mails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};