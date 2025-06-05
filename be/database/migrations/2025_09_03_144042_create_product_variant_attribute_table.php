<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantAttributeTable extends Migration
{
    public function up()
    {
        Schema::create('product_variant_attribute', function (Blueprint $table) {
            $table->unsignedBigInteger('product_variant_id'); // PK, FK1
            $table->unsignedBigInteger('attribute_variant_id'); // PK, FK2

            $table->primary(['product_variant_id', 'attribute_variant_id']);

            // Khóa ngoại
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
            $table->foreign('attribute_variant_id')->references('id')->on('attribute_variants')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_variant_attribute');
    }
}
