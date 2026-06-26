<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'symbol',
        'company_name',
        'quantity',
        'average_price',
        'current_price',
    ];

    protected $casts = [
        'quantity' => 'decimal:4',
        'average_price' => 'decimal:2',
        'current_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}