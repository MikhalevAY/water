<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeterData extends Model
{
    use HasFactory;

    public const PER_PAGE = 100;

    protected $fillable = [
        'customer_account',
        'indication',
        'month',
        'year',
        'staff_iin',
        'consumed_volume',
        'counter_serial',
        'comment',
    ];

    protected $casts = [
        'customer_account' => 'integer',
        'indication' => 'float',
        'month' => 'integer',
        'year' => 'integer',
        'staff_iin' => 'integer',
        'consumed_volume' => 'float',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_account', 'account');
    }

    public function counter(): BelongsTo
    {
        return $this->belongsTo(Counter::class, 'counter_serial', 'serial');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_iin', 'iin');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(MeterDataPhoto::class);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
