<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::paginate(10)->toResourceCollection();
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return $company->toResource();
    }
}
