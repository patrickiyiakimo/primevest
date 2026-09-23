<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyTrader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'display_name', 'avatar_initials', 'avatar_color', 'bio',
        'win_rate', 'total_roi', 'roi_period', 'copiers', 'risk_score',
        'ytd_return', 'is_featured', 'status',
    ];

    public function performances()
    {
        return $this->hasMany(CopyTraderPerformance::class)->orderBy('month', 'desc');
    }

    public function requests()
    {
        return $this->hasMany(CopyTradingRequest::class);
    }
}