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

    public const PER_PAGE = 2500;

    protected $fillable = [
        'customer_account',
        'indication',
        'month',
        'year',
        'staff_iin',
        'consumed_volume',
        'counter_serial',
        'comment',
        'total_consumption',
        'cost_services_begin',
        'cost_subsidies_begin',
        'total_consumption_norm',
        'total_consumption_col',
        'total_consumption_epuv',
        'total_consumption_bz',
        'total_consumption_cs',
        'cost_services_begin_norm',
        'cost_services_begin_col',
        'cost_services_begin_epuv',
        'cost_services_begin_bz',
        'cost_services_begin_cs',
        'cost_subsidies_begin_norm',
        'cost_subsidies_begin_col',
        'cost_subsidies_begin_epuv',
        'cost_subsidies_begin_bz',
        'cost_subsidies_begin_cs',
        'to_full_pay',
        'total_consumption_all',
        'cost_services_begin_all',
        'cost_subsidies_begin_all',
    ];

    protected $casts = [
        'customer_account' => 'integer',
        'indication' => 'float',
        'month' => 'integer',
        'year' => 'integer',
        'consumed_volume' => 'float',
        'to_full_pay' => 'integer',
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
