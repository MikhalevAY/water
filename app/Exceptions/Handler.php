<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (AuthenticationException $e) {
            return response()->json(['message' => 'Необходимо авторизоваться'], Response::HTTP_UNAUTHORIZED);
        });

        $this->renderable(function (AuthorizationException $e) {
            return response()->json(['message' => 'Доступ запрещен'], Response::HTTP_FORBIDDEN);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->json([
                'message' => 'Неверный запрос. Проверьте параметры запроса',
            ], Response::HTTP_NOT_FOUND);
        });
    }

    protected function invalidJson($request, ValidationException $exception): JsonResponse
    {
        return response()->json([
            'message' => __('messages.provided_data_invalid'),
            'errors' => $exception->errors(),
        ], $exception->status);
    }
}
