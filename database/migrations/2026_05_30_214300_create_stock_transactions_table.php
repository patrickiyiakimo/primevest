<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('symbol', 10);
            $table->string('company_name');
            $table->enum('type', ['buy', 'sell']);
            $table->decimal('quantity', 15, 4);
            $table->decimal('price_per_share', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->enum('order_type', ['market', 'limit', 'stop'])->default('market');
            $table->decimal('limit_price', 15, 2)->nullable();
            $table->string('status')->default('completed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_transactions');
    }
};