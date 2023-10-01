<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SetPasswordRequest;
use App\Models\User;
use App\Models\UserStatus;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'setPassword', 'changePassword', 'refresh']]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('iin', 'password');

        $user = User::query()->where(['iin' => $credentials['iin']])->first();

        if ($user->status_code == UserStatus::STATUS_NEW) {
            return response()->json([
                'allowed_to_set_password' => true,
                'message' => __('l10n_auth_allowed_to_set_password'),
            ]);
        }

        if ($user->status_code == UserStatus::STATUS_ACTIVE && !isset($credentials['password'])) {
            return response()->json([
                'message' => __('l10n_auth_fill_all_fields'),
            ], Response::HTTP_BAD_REQUEST);
        }

        if ($user->status_code == UserStatus::STATUS_PASSWORD_RESTORE) {
            return response()->json([
                'password_restore_process' => true,
                'message' => __('l10n_auth_password_restore_process'),
            ]);
        }

        if ($user->status_code == UserStatus::STATUS_INACTIVE) {
            return response()->json([
                'user_deactivated' => true,
                'message' => __('l10n_auth_user_deactivated'),
            ]);
        }

        if (!$token = $this->authService->login($credentials)) {
            return response()->json(['message' => __('l10n_auth_failed')], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'staff' => Auth::user()->load('waterSupplier'),
            'token' => $token,
        ]);
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $this->authService->changePasswordRequest($request->validated());

        return response()->json([
            'message' => 'l10n_auth_password_change_was_sent'
        ]);
    }

    public function setPassword(SetPasswordRequest $request): JsonResponse
    {
        $this->authService->setPassword($request->validated());

        return response()->json([
            'message' => 'l10n_auth_password_was_set',
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'l10n_auth_logout'
        ]);
    }

    public function refresh(): JsonResponse
    {
        return response()->json(['token' => auth()->refresh()]);
    }
}
