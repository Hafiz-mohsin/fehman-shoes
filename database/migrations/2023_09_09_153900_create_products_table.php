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
            $table->string('title', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->text('short_decription', 50)->nullable();
            $table->text('long_description', 150)->nullable();
            $table->double('price')->nullable();
            $table->string('category_id',)->nullable();
            $table->string('type')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('status')->default(0);
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
