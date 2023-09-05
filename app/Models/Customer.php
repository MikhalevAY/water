<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'last_name',
        'name',
        'patronymic',
        'iin',
        'registration_city_id',
        'registration_address',
        'residence_city_id',
        'residence_address',
        'amount_of_people',
        'connected_at'
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
