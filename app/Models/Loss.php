<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loss extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'amount',
        'profit_deducted',
        'balance_deducted',
        'reason',
        'status',
        'applied_at',
        'reversed_at',
        'reversed_by',
        'reversal_reason',
    ];

    protected $casts = [
        'amount' => 'float',
        'profit_deducted' => 'float',
        'balance_deducted' => 'float',
        'applied_at' => 'datetime',
        'reversed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function reversedBy()
    {
        return $this->belongsTo(User::class, 'reversed_by');
    }

    public function isReversed(): bool
    {
        return $this->status === 'reversed';
    }
}
