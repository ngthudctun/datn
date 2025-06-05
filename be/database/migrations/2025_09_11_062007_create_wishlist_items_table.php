<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistItemsTable extends Migration
{
    public function up()
    {
        Schema::create('wishlist_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('wishlist_id')->constrained('wishlists')->onDelete('cascade');
    $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('cascade');
    $table->timestamps();
});


    }

    public function down()
    {
        Schema::dropIfExists('wishlist_items');
    }
}
