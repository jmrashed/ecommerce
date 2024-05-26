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
        Schema::create('pkg_product_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('pkg_products');
            $table->foreignId('tag_id')->constrained('pkg_tags');
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
        Schema::dropIfExists('pkg_product_tag');
    }
};
