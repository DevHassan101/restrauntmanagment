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
        Schema::create('takeaway_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('cashier_name');
            $table->string('payment_type');
            $table->integer('items');
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
        Schema::dropIfExists('takeaway_orders');
    }
};
