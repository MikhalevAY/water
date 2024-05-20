<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'staff';

    protected $fillable = [
        'last_name',
        'name',
        'patronymic',
        'iin',
        'water_supplier_bin',
        'status_code',
        'password',
        'last_auth',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'last_auth' => 'datetime',
        'status_code' => 'integer',
    ];

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function waterSupplier(): BelongsTo
    {
        return $this->belongsTo(WaterSupplier::class, 'water_supplier_bin', 'bin')->select('name', 'bin');
    }

    public function status(): HasOne
    {
        return $this->hasOne(UserStatus::class, 'status_code', 'code');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
