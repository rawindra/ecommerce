<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_images', function (Blueprint $table) {
            $table->id();
            $table->integer('variant_id')->unsigned()->nullable();
            $table->string('image1', 191)->nullable();
            $table->string('image2', 191)->nullable();
            $table->string('image3', 191)->nullable();
            $table->string('image4', 191)->nullable();
            $table->string('image5', 191)->nullable();
            $table->string('image6', 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variant_images');
    }
}
