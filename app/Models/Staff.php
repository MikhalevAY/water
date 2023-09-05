<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'last_name',
        'name',
        'patronymic',
        'iin',
        'water_supplier_bin',
        'status_code'
    ];

    public function waterSupplier(): BelongsTo
    {
        return $this->belongsTo(WaterSupplier::class, 'water_supplier_bin', 'bin');
    }

    public function status(): HasOne
    {
        return $this->hasOne(StaffStatus::class, 'status_code', 'code');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
