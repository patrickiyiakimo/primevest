<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('wallet_addresses')) {
            Schema::create('wallet_addresses', function (Blueprint $table) {
                $table->id();
                $table->string('coin', 20);
                $table->string('label');
                $table->string('network')->nullable();
                $table->string('address', 255);
                $table->string('logo')->nullable();
                $table->string('color', 20)->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();

                $table->index(['is_active', 'sort_order']);
            });
        }

        // Seed the wallets that were previously hardcoded on the deposit page.
        if (DB::table('wallet_addresses')->count() === 0) {
            $now = now();
            DB::table('wallet_addresses')->insert([
                [
                    'coin' => 'BTC',
                    'label' => 'Bitcoin (BTC)',
                    'network' => 'Bitcoin (BTC)',
                    'address' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
                    'logo' => 'images/btc.png',
                    'color' => '#f7931a',
                    'is_active' => true,
                    'sort_order' => 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'coin' => 'USDT',
                    'label' => 'Tether (USDT – ERC20)',
                    'network' => 'ERC-20',
                    'address' => '0xAEDda9D240fB28f0C12a968EE0e5c9a0b4AaA3B4',
                    'logo' => 'images/eth.png',
                    'color' => '#8a92b2',
                    'is_active' => true,
                    'sort_order' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'coin' => 'USDT',
                    'label' => 'Tether (USDT – TRC20)',
                    'network' => 'TRON (TRC-20)',
                    'address' => 'TX7XpN394okDd3rFZag4v1xH3v9WZJQaCo',
                    'logo' => 'images/Tron-logo.jfif',
                    'color' => '#26a17b',
                    'is_active' => true,
                    'sort_order' => 2,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'coin' => 'SOL',
                    'label' => 'Solana (SOL)',
                    'network' => 'Solana',
                    'address' => '7YmM2ZvUGrfKXJq3ihQfC8gGKbQ2kBn3kXJb2mZv92oK',
                    'logo' => 'images/solana-image.jfif',
                    'color' => '#9945ff',
                    'is_active' => true,
                    'sort_order' => 3,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('wallet_addresses');
    }
};
