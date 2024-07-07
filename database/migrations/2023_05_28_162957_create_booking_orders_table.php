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
        Schema::create('booking_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('payment_type');
            $table->string('payment_status');
            $table->string('rider_name');
            $table->date('event_date');
            $table->integer('items');
            $table->decimal('delievery_charges');
            $table->decimal('sub_total');
            $table->decimal('total');
            $table->decimal('recieve');
            $table->decimal('left')->nullable();
            $table->decimal('refund')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_orders');
    }
};
