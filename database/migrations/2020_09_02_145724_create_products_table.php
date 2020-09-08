<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned()->index('products_category_id_foreign');
            $table->integer('subcat_id')->unsigned()->index('products_subcat_id_foreign');
            $table->integer('childcat_id')->nullable();
            $table->integer('brand_id')->unsigned()->nullable()->index('products_brand_id_foreign');
            $table->string('name', 191)->nullable();
            $table->text('des', 65535)->nullable();
            $table->text('key_features', 65535)->nullable();
            $table->string('model', 191)->nullable();
            $table->string('sku', 191)->nullable();
            $table->float('price', 10, 0)->nullable();
            $table->string('offer_price', 191)->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(1);
            $table->string('main_image');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
