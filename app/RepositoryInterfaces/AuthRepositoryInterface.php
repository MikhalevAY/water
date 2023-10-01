<?php

namespace App\RepositoryInterfaces;

use App\Repositories\AuthRepository;

/**
 * @see AuthRepository
 **/
interface AuthRepositoryInterface
{
    public function updateLastAuth(): void;

    public function setPassword(array $params): void;

    public function changePasswordRequest(array $params): void;
}
