<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkg_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('category_id');
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('pkg_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('pkg_brands')->onDelete('set null');
        });

        // Optional: Indexing for performance
        Schema::table('pkg_products', function (Blueprint $table) {
            $table->index('category_id');
            $table->index('brand_id');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkg_products');
    }
}
