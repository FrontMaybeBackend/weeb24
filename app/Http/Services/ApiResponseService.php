<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;

class ApiResponseService
{

    public function successResponse($data): JsonResponse
    {
        return response()->json([
            'message' => 'Operation Successfully',
            'data' => $data,
        ]);
    }

    public function createdResource($data): JsonResponse
    {
        return response()->json([
            'message' => 'Resource created successfully',
            'data' => $data,
        ], 201);
    }

    public function noChangesDetected(): JsonResponse
    {
        return response()->json([
            'message' => 'No changes detected',
        ], 400);
    }

    public function deletedResource(): JsonResponse
    {
        return response()->json([
            'message' => 'Resource deleted successfully',
        ], 204);
    }

    public function createdUser($data)
    {
        return response()->json([
            'status' => 201,
            'message' => 'User created successfully.',
            'data' => $data,
        ]);
    }

    public function loginUser($data)
    {
        return response()->json([
            'status' => 200,
            'message' => 'User login successfully.',
            'token' => $data,
        ]);
    }

    public function loginFailed()
    {
        return response()->json([
            'status' => 404,
            'message' => 'User with this email not found',
        ]);
    }


}
