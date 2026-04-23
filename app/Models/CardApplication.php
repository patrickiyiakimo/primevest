<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'card_type', 
        'card_tier', 
        'delivery_address', 
        'phone', 
        'id_type', 
        'status', 
        'admin_notes', 
        'approved_at'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}