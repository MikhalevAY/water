<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
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
        $this->middleware('auth:api', ['except' => ['login', 'setPassword', 'refresh']]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('iin', 'password');

        $user = User::query()->where(['iin' => $credentials['iin']])->first();

        if ($user->status_code == UserStatus::STATUS_NEW) {
            return response()->json([
                'allowed_to_set_password' => true,
                'message' => __('auth.allowed_to_set_password'),
            ]);
        }

        if ($user->status_code == UserStatus::STATUS_ACTIVE && !isset($credentials['password'])) {
            return response()->json([
                'message' => __('auth.fill_all_fields')
            ], Response::HTTP_BAD_REQUEST);
        }

        if ($user->status_code == UserStatus::STATUS_PASSWORD_RESTORE) {
            return response()->json([
                'password_restore_process' => true,
                'message' => __('auth.password_restore_process'),
            ]);
        }

        if ($user->status_code == UserStatus::STATUS_INACTIVE) {
            return response()->json([
                'user_deactivated' => true,
                'message' => __('auth.user_deactivated'),
            ]);
        }

        if (!$token = $this->authService->login($credentials)) {
            return response()->json(['message' => __('auth.failed')], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'staff' => Auth::user(),
            'token' => $token,
        ]);
    }

    public function setPassword(SetPasswordRequest $request): JsonResponse
    {
        $this->authService->setPassword($request->validated());

        return response()->json([
            'message' => __('auth.password_was_set')
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => __('auth.logout')]);
    }

    public function refresh(): JsonResponse
    {
        return response()->json(['token' => auth()->refresh()]);
    }
}
