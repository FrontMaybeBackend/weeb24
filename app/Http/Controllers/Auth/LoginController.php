<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\ApiResponseService;
use App\Http\Services\AuthService;

class LoginController
{

    private ApiResponseService $apiResponseService;

    private AuthService $authService;

    public function __construct(
        ApiResponseService $apiResponseService,
        AuthService $authService
    ) {
        $this->apiResponseService = $apiResponseService;
        $this->authService = $authService;
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        //passes on the login data for checking
        $authResponse = $this->authService->authCheck($credentials);
        if ($authResponse['status'] === 'success') {
            return $this->apiResponseService->loginUser($authResponse['token']);
        }
        return $this->apiResponseService->loginFailed();
    }
}
