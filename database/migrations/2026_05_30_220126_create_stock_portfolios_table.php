<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stock_portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('symbol', 10);
            $table->string('company_name');
            $table->decimal('quantity', 15, 4)->default(0);
            $table->decimal('average_price', 15, 2)->default(0);
            $table->timestamps();
            
            $table->unique(['user_id', 'symbol']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_portfolios');
    }
};