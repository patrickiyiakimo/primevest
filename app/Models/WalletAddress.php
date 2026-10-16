<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletAddress extends Model
{
    protected $fillable = [
        'coin',
        'label',
        'network',
        'address',
        'logo',
        'color',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Wallets ready for display on the deposit page, keyed by coin code.
     *
     * @return \Illuminate\Support\Collection<string, array>
     */
    public static function forDepositPage()
    {
        return static::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->keyBy('coin')
            ->map(function (self $w) {
                return [
                    'label' => $w->label,
                    'network' => $w->network,
                    'addr' => $w->address,
                    'color' => $w->color,
                    'logo' => self::logoUrl($w->logo),
                ];
            });
    }

    /**
     * Resolve a stored logo value to a usable URL (supports full URLs and local paths).
     */
    public static function logoUrl(?string $logo): ?string
    {
        if (! $logo) {
            return null;
        }

        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://') || str_starts_with($logo, '/')) {
            return $logo;
        }

        return asset($logo);
    }
}
