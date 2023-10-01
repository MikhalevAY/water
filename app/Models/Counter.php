<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'customer_account',
        'checked_at'
    ];

    protected $casts = [
        'customer_account' => 'integer'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_account', 'account');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
