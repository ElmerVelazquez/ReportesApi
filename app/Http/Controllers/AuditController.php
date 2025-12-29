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
        return Audit::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuditRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Audit $audit)
    {
        return $audit->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuditRequest $request, Audit $audit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit)
    {
        //
    }
}
