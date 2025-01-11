<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
        $employeeId = $this->route('employee');

        return [
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'email' => ['nullable', 'email', Rule::unique(Employee::class, 'email')->ignore($employeeId, 'id')],
            'phone' => [
                'nullable',
                'digits_between:9,15',
                Rule::unique(Employee::class, 'phone')->ignore($employeeId, 'id')
            ],
            'company_id' => 'nullable',
        ];
    }
}
