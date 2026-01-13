<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricing_package_id',
        'feature_text',
        'is_included',
        'order',
    ];

    protected $casts = [
        'is_included' => 'boolean',
    ];

    public function package()
    {
        return $this->belongsTo(PricingPackage::class, 'pricing_package_id');
    }
}