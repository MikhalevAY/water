<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'bin',
        'name',
        'contract_number',
        'enclosed_at',
        'validity_period',
        'tariff_id',
        'order_number',
        'order_created_at',
        'order_started_at',
        'water_sources',
    ];

    protected $casts = [
        'water_sources' => 'json',
        'bin' => 'integer',
        'validity_period' => 'integer',
        'tariff_id' => 'integer',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
