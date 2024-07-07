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
        Schema::create('dinein_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id')->on('tables')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->on('discounts')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->on('taxes')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('payment_type');
            $table->integer('items');
            $table->decimal('subtotal');
            $table->decimal('tax');
            $table->decimal('discount')->nullable();
            $table->decimal('total');
            $table->decimal('recieve');
            $table->decimal('refund');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinein_orders');
    }
};
