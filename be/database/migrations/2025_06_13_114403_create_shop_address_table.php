<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shop_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->string('address_line');           
            $table->string('ward');                    
            $table->string('district');                
            $table->string('city');                    
            $table->string('postal_code')->nullable(); 
            $table->string('country')->default('Việt Nam');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shop_addresses');
    }
};
