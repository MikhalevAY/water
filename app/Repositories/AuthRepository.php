<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserStatus;
use App\RepositoryInterfaces\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{

    public function updateLastAuth(): void
    {
        auth()->user()->update([
            'last_auth' => now(),
        ]);
    }

    public function setPassword(array $params): void
    {
        User::query()
            ->where('iin', $params['iin'])
            ->update([
                'password' => bcrypt($params['password']),
                'status_code' => UserStatus::STATUS_ACTIVE,
            ]);
    }

    public function changePasswordRequest(array $params): void
    {
        User::query()
            ->where('iin', $params['iin'])
            ->update([
                'password' => null,
                'status_code' => UserStatus::STATUS_PASSWORD_RESTORE,
            ]);
    }
}
