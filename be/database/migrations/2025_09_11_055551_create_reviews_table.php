<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // PK

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_item_id');
            $table->unsignedBigInteger('product_id');

            $table->tinyInteger('rating'); // điểm đánh giá 1-5
            $table->text('content')->nullable();

            $table->timestamps(); // created_at và updated_at

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
