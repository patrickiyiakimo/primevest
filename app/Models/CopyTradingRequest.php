<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyTradingRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'copy_trader_id', 'amount', 'status', 'approved_at', 'rejected_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function copyTrader()
    {
        return $this->belongsTo(CopyTrader::class);
    }
}