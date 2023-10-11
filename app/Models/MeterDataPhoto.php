<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MeterDataPhoto extends Model
{
    use HasFactory;

    public const WIDTH = 1200;
    public const HEIGHT = 1200;

    public $timestamps = false;

    protected $fillable = [
        'meter_data_id',
        'path',
    ];

    protected $hidden = [
        'id',
        'meter_data_id',
    ];


    public function meterData(): BelongsTo
    {
        return $this->belongsTo(MeterData::class);
    }

    public function getPathAttribute(): string
    {
        return asset('storage/' . $this->attributes['path']);
    }
}
