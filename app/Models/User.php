<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'total_profits',
        'country',
        'phone',
        'is_admin',
        'referred_by',
        'referral_code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'balance' => 'decimal:2',
        'total_profits' => 'decimal:2',
        'is_admin' => 'boolean',
        'kyc_submitted_at' => 'datetime',
        'kyc_verified_at' => 'datetime',
    ];

    // Relationship: User who referred this user
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    // Relationship: Users referred by this user
    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    // Generate unique referral code
    public static function generateReferralCode()
    {
        do {
            $code = strtoupper(substr(md5(uniqid()), 0, 8));
        } while (self::where('referral_code', $code)->exists());
        
        return $code;
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('created_at', 'desc');
    }
    
    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class)->orderBy('created_at', 'desc');
    }

    public function stockPortfolio()
    {
        return $this->hasMany(StockPortfolio::class);
    }

    /**
     * Get current stock prices
     */
    private function getStockPrices()
    {
        return [
            'AAPL' => 175.50,
            'MSFT' => 420.75,
            'GOOGL' => 140.25,
            'AMZN' => 145.80,
            'TSLA' => 245.50,
            'NVDA' => 895.20,
            'META' => 485.30,
            'NFLX' => 620.40,
        ];
    }

    /**
     * Get total stocks current value
     */
    public function getStocksValueAttribute()
    {
        $prices = $this->getStockPrices();
        $stocksValue = 0;
        $stocksPortfolio = $this->stockPortfolio;
        
        foreach ($stocksPortfolio as $holding) {
            $currentPrice = $prices[$holding->symbol] ?? 100.00;
            $stocksValue += $holding->quantity * $currentPrice;
        }
        
        return $stocksValue;
    }

    /**
     * Get total spendable balance (Main Balance + Profits + Stocks Value)
     */
    public function getSpendableBalanceAttribute()
    {
        return $this->balance + ($this->total_profits ?? 0) + $this->stocksValue;
    }
}