<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('copy_traders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->string('avatar_initials')->nullable();
            $table->string('avatar_color')->default('#18d893');
            $table->text('bio')->nullable();
            $table->decimal('win_rate', 5, 2)->default(0);
            $table->decimal('total_roi', 8, 2)->default(0);
            $table->string('roi_period')->nullable();
            $table->integer('copiers')->default(0);
            $table->decimal('risk_score', 5, 2)->default(0);
            $table->decimal('ytd_return', 8, 2)->default(0);
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('copy_traders');
    }
};