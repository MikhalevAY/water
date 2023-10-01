<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Month extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number'
    ];

    protected $casts = [
        'number' => 'integer'
    ];

    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('number', 'asc');
    }
}
