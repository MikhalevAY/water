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
        'last_consumption',
        'total_consumption',
        'counter_serial',
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
        'cost_subsidies_begin_all',
        'cost_services_begin_all',
        'total_consumption_all',
    ];

    protected $casts = [
        'customer_account' => 'integer',
        'month' => 'integer',
        'year' => 'integer',
        'last_indication' => 'float',
        'last_consumption' => 'float',
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
