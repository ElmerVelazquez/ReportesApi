<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController
{

    public function index()
    {
        return Company::get()->toResourceCollection();
    }

    public function show(Company $company)
    {
        return $company->toResource();
    }
}
