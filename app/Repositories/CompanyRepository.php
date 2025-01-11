<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository implements CrudRepositoryInterface
{

    public function all()
    {
        return Company::paginate(15);
    }

    public function find(int $id): ?Company
    {
        return Company::findOrFail($id);
    }

    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function update(int $id, array $data): Company|bool
    {
        $company = $this->find($id);

        $company->fill($data);
        //if there have been no changes, do not update
        if (!$company->isDirty()) {
            return false;
        }
        $result = $company->update($data);
        return $result ? $company : false;
    }

    public function delete(int $id)
    {
        $company = $this->find($id);
        return $company->delete();
    }
}
