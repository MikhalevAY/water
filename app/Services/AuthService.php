<?php

namespace App\Services;

use App\RepositoryInterfaces\AuthRepositoryInterface;

class AuthService
{
    public function __construct(private readonly AuthRepositoryInterface $authRepository)
    {
    }

    public function login(array $credentials): ?string
    {
        if (!$token = auth()->attempt($credentials)) {
            return null;
        }

        $this->authRepository->updateLastAuth();

        return $token;
    }

    public function setPassword(array $params): void
    {
        $this->authRepository->setPassword($params);
    }

    public function changePasswordRequest(array $params): void
    {
        $this->authRepository->changePasswordRequest($params);
    }
}
