<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'last_name',
        'name',
        'patronymic',
        'iin',
        'water_supplier_bin',
        'registration_city_code',
        'registration_address',
        'residence_city_code',
        'residence_address',
        'amount_of_people',
        'connected_at',
        'consume_type_id',
        'registration_address_house',
        'residence_address_house',
        'residence_address_appartment',
        'registration_address_appartment',
        'notation',
        'second_counter',
        'cid',
    ];

    protected $casts = [
        'registration_city_code' => 'integer',
        'residence_city_code' => 'integer',
        'amount_of_people' => 'integer',
        'last_indication' => 'float',
        'account' => 'integer',
        'consume_type_id' => 'integer',
        'water_limit' => 'float',
        'iin' => 'string',
        'water_supplier_bin' => 'string',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function meterData(): HasMany
    {
        return $this->hasMany(MeterData::class, 'customer_account', 'account');
    }

    public function waterSupplier(): BelongsTo
    {
        return $this->belongsTo(WaterSupplier::class);
    }

    public function scopeWithLastMeterData(Builder $builder): Builder
    {
        return $builder->leftJoin('meter_data', function ($join) {
            $join->on('meter_data.customer_account', 'customers.account')
                ->whereRaw('meter_data.id = (SELECT MAX(id) FROM meter_data WHERE customer_account = customers.account)');
        })
            ->select('customers.*', 'meter_data.indication as last_indication');
    }
}
