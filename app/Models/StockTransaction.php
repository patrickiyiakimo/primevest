<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $table = 'stock_transactions';

    protected $fillable = [
        'user_id',
        'symbol',
        'company_name',
        'type',
        'quantity',
        'price_per_share',
        'total_amount',
        'order_type',
        'status',
    ];

    protected $casts = [
        'quantity' => 'decimal:4',
        'price_per_share' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}