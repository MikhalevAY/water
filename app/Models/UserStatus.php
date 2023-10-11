<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    public const STATUS_NEW = 10;
    public const STATUS_ACTIVE = 20;
    public const STATUS_PASSWORD_RESTORE = 30;
    public const STATUS_INACTIVE = 40;

    protected $table = 'staff_statuses';

    protected $fillable = [
        'status',
        'code',
    ];

    protected $casts = [
        'code' => 'integer',
    ];

    protected $hidden = [
        'id',
    ];
}
