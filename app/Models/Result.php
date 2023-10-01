<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_account',
        'month',
        'year',
        'last_indication',
        'total_consumption',
        'counter_serial'
    ];

    protected $casts = [
        'customer_account' => 'integer',
        'month' => 'integer',
        'year' => 'integer',
        'last_indication' => 'float',
        'total_consumption' => 'float',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_account', 'account');
    }

    public function counter(): BelongsTo
    {
        return $this->belongsTo(Counter::class, 'counter_serial', 'serial');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
