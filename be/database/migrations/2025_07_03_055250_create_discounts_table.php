<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id(); // Dùng id mặc định cho khóa chính
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->decimal('value', 10, 2); // Giá trị giảm giá
            $table->enum('discount_type', ['percentage', 'fixed_amount'])->default('percentage');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
