<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockPriceHistory extends Model
{
    protected $table = 'stock_price_history';

    protected $fillable = ['symbol', 'price'];
}