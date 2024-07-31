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
        Schema::create('history_wastes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waste_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('name');
            $table->unsignedBigInteger('new_price');
            $table->unsignedBigInteger('old_price');
            $table->timestamps();

            $table->foreign('waste_id')->references('id')->on('wastes')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_wastes');
    }
};
