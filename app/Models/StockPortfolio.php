<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPortfolio extends Model
{
    use HasFactory;

    protected $table = 'stock_portfolios';

    protected $fillable = [
        'user_id',
        'symbol',
        'company_name',
        'quantity',
        'average_price',
    ];

    protected $casts = [
        'quantity' => 'decimal:4',
        'average_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}