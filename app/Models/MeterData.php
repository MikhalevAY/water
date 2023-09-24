<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MeterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_account',
        'indication',
        'month',
        'year',
        'staff_iin',
        'consumed_volume',
        'counter_serial'
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

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
