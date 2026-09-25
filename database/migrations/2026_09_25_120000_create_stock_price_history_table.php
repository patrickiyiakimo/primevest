<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stock_price_history', function (Blueprint $table) {
            $table->id();
            $table->string('symbol', 10)->index();
            $table->decimal('price', 15, 4);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_price_history');
    }
};