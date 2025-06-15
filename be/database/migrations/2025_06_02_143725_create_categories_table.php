<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // id mặc định là category_id
            $table->string('category_name');
            $table->foreignId('category_parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', [1, 2])->default(1); // ➕ Thêm dòng này
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
