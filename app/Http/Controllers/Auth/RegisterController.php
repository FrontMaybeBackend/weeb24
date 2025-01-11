<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\ApiResponseService;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    private UserRepository $userRepository;
    private ApiResponseService $apiResponseService;

    public function __construct(UserRepository $userRepository, ApiResponseService $apiResponseService)
    {
        $this->userRepository = $userRepository;
        $this->apiResponseService = $apiResponseService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $user = $this->userRepository->create($request->validated());
        return $this->apiResponseService->createdUser($user);
    }


}
