<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Replace the placeholder USDC (ERC-20) option with a real USDT (ERC-20) wallet.
        DB::table('wallet_addresses')->updateOrInsert(
            ['coin' => 'USDT_ERC20'],
            [
                'label' => 'Tether (USDT – ERC20)',
                'network' => 'ERC-20',
                'address' => '0xAEDda9D240fB28f0C12a968EE0e5c9a0b4AaA3B4',
                'logo' => 'images/eth.png',
                'color' => '#26a17b',
                'is_active' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Keep SOL after the two USDT networks.
        DB::table('wallet_addresses')->where('coin', 'SOL')->update(['sort_order' => 4]);
    }

    public function down(): void
    {
        DB::table('wallet_addresses')->where('coin', 'USDT_ERC20')->delete();
    }
};
