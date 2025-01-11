<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $companyId = $this->route('company');

        return [
            'name' => ['nullable', Rule::unique(Company::class, 'name')->ignore($companyId, 'id')],
            'city' => 'nullable|string',
            'postal_code' => 'nullable|digits:5|integer',
            'nip' => ['nullable', 'digits:10', Rule::unique(Company::class, 'nip')->ignore($companyId, 'id')],
            'address' => ['nullable', Rule::unique(Company::class, 'address')->ignore($companyId, 'id')]

        ];
    }

}
