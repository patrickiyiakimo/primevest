<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'plan_name', 
        'amount', 
        'roi', 
        'expected_return',
        'duration', 
        'duration_days', 
        'start_date', 
        'end_date', 
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'amount' => 'decimal:2',
        'expected_return' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}