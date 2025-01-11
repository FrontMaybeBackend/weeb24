<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository implements CrudRepositoryInterface
{

    public function all()
    {
        return Employee::with('company')->paginate(15);
    }

    public function find(int $id): ?Employee
    {
        return Employee::findOrFail($id);
    }

    public function create(array $data): Employee
    {
        return Employee::create($data);
    }

    public function update(int $id, array $data): Employee|bool
    {
        $employee = $this->find($id);

        $employee->fill($data);
        //if there have been no changes, do not update
        if (!$employee->isDirty()) {
            return false;
        }
        $result = $employee->update($data);
        return $result ? $employee : false;
    }

    public function delete(int $id)
    {
        $employee = $this->find($id);
        return $employee->delete();
    }
}
