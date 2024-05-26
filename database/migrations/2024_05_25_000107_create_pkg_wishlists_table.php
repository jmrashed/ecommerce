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
        Schema::create('pkg_wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('pkg_customers');
            $table->foreignId('product_id')->constrained('pkg_products');
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
        Schema::dropIfExists('pkg_wishlists');
    }
};
