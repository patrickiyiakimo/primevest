<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('copy_trader_performances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('copy_trader_id')->constrained()->cascadeOnDelete();
            $table->string('month');
            $table->decimal('return_percent', 8, 2)->default(0);
            $table->decimal('equity', 15, 2)->default(0);
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('copy_trader_performances');
    }
};