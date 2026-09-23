<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyTraderPerformance extends Model
{
    use HasFactory;

    protected $fillable = ['copy_trader_id', 'month', 'return_percent', 'equity', 'notes'];

    public function copyTrader()
    {
        return $this->belongsTo(CopyTrader::class);
    }
}