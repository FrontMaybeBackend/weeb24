<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Services\ApiResponseService;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    private EmployeeRepository $employeeRepository;
    private ApiResponseService $apiResponseService;

    public function __construct(EmployeeRepository $employeeRepository, ApiResponseService $apiResponseService)
    {
        $this->employeeRepository = $employeeRepository;
        $this->apiResponseService = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeesWithCompanies = $this->employeeRepository->all();
        return $this->apiResponseService->successResponse($employeesWithCompanies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $employeeRequest)
    {
        $employee = $this->employeeRepository->create($employeeRequest->validated());
        return $this->apiResponseService->createdResource($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = $this->employeeRepository->find($id);
        return $this->apiResponseService->successResponse($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $employeeRequest, int $id)
    {
        $updatedEmployee = $this->employeeRepository->update($id, $employeeRequest->validated());
        if (!$updatedEmployee) {
            return $this->apiResponseService->noChangesDetected();
        }
        return $this->apiResponseService->successResponse($updatedEmployee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->employeeRepository->delete($id);
        return $this->apiResponseService->deletedResource();
    }
}
