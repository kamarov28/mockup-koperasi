<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('toko_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('category');
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->unsignedInteger('stock')->default(0);
            $table->string('unit')->default('Unit');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['is_active', 'category']);
        });

        Schema::create('toko_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('order_number')->unique();
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->string('payment_method');
            $table->text('pickup_note')->nullable();
            $table->decimal('total', 15, 2);
            $table->timestamps();
        });

        Schema::create('toko_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('toko_orders')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('toko_products')->nullOnDelete();
            $table->string('product_name');
            $table->unsignedInteger('quantity');
            $table->string('unit');
            $table->decimal('unit_price', 15, 2);
            $table->decimal('line_total', 15, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('toko_order_items');
        Schema::dropIfExists('toko_orders');
        Schema::dropIfExists('toko_products');
    }
};
