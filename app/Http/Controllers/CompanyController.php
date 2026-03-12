<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController
{

    public function index()
    {
        return Company::paginate(10)->toResourceCollection();
    }

    public function show(Company $company)
    {
        return $company->toResource();
    }
}
