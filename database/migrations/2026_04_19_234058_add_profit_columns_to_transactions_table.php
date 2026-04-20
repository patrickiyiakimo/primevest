<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('transactions', 'profit_before')) {
                $table->decimal('profit_before', 15, 2)->default(0)->after('balance_after');
            }
            if (!Schema::hasColumn('transactions', 'profit_after')) {
                $table->decimal('profit_after', 15, 2)->default(0)->after('profit_before');
            }
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'profit_before')) {
                $table->dropColumn('profit_before');
            }
            if (Schema::hasColumn('transactions', 'profit_after')) {
                $table->dropColumn('profit_after');
            }
        });
    }
};