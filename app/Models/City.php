<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'city_id'
    ];

    protected $casts = [
        'city_id' => 'integer'
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
