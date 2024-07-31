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
        Schema::create('waste_transaction_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waste_transaction_id');
            $table->unsignedBigInteger('waste_id');
            $table->unsignedBigInteger('weight')->default(0);
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('total_price')->default(0);
            $table->timestamps();

            $table->foreign('waste_transaction_id')->references('id')->on('waste_transactions')->onDelete('cascade');
            $table->foreign('waste_id')->references('id')->on('wastes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_transaction_item');
    }
};
