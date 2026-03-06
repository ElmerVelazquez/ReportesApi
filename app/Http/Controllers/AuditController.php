<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Http\Requests\StoreAuditRequest;
use App\Http\Requests\UpdateAuditRequest;

class AuditController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Audit::paginate(10)->toResourceCollection();
    }

    /**
     * Display the specified resource.
     */
    public function show(Audit $audit)
    {
        return $audit->toResource();
    }
}
