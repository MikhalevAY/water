<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'water_source_id',
        'name',
        'location',
        'ipvu',
        'water_suppliers',
    ];

    protected $casts = [
        'water_source_id' => 'integer',
        'water_suppliers' => 'json',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
