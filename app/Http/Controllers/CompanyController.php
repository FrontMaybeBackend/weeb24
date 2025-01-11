<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Services\ApiResponseService;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    private CompanyRepository $companyRepository;
    private ApiResponseService $apiResponseService;

    public function __construct(CompanyRepository $companyRepository, ApiResponseService $apiResponseService)
    {
        $this->companyRepository = $companyRepository;
        $this->apiResponseService = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyRepository->all();
        return $this->apiResponseService->successResponse($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $companyRequest)
    {
        $newCompany = $this->companyRepository->create($companyRequest->validated());
        return $this->apiResponseService->createdResource($newCompany);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = $this->companyRepository->find($id);
        return $this->apiResponseService->successResponse($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $updateCompanyRequest, int $id)
    {
        $updatedCompany = $this->companyRepository->update($id, $updateCompanyRequest->validated());
        if (!$updatedCompany) {
            return $this->apiResponseService->noChangesDetected();
        }
        return $this->apiResponseService->successResponse($updatedCompany);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->companyRepository->delete($id);
        return $this->apiResponseService->deletedResource();
    }
}
