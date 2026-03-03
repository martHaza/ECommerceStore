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
        Schema::create('shipping_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->enum('carrier', ['omniva', 'dpd', 'latvijas_pasts'])->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('recipient_name');
            $table->string('recipient_surname');
            $table->string('recipient_email');
            $table->string('recipient_phone');
            $table->string('recipient_address');
            $table->decimal('weight', 8, 2)->nullable();
            $table->enum('package_size', ['extra small', 'small', 'medium', 'large'])->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_info');
    }
};
