<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
    $table->id(); // PK banner_id
    $table->string('url')->nullable()->comment('Link chuyển hướng khi click banner');
    $table->string('image_url')->nullable()->comment('Đường dẫn hình ảnh banner');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
