<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id mặc định
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Các khóa ngoại payment_id, shipping_id, voucher_id, trỏ tới cột 'id' mặc định trong các bảng
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onDelete('set null');
            $table->foreignId('shipping_id')->nullable()->constrained('shippings')->onDelete('set null');
            $table->foreignId('voucher_id')->nullable()->constrained('vouchers')->onDelete('set null');

            $table->string('status')->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');
            $table->dateTime('order_date');
            $table->text('note')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
