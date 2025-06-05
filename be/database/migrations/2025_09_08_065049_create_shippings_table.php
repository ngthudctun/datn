<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id(); // Laravel mặc định là 'id' cho PK
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_fee', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
