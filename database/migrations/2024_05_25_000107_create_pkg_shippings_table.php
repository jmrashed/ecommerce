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
        Schema::create('pkg_shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('pkg_orders');
            $table->string('tracking_number')->nullable();
            $table->string('carrier');
            $table->decimal('shipping_cost', 10, 2);
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
        Schema::dropIfExists('pkg_shippings');
    }
}
