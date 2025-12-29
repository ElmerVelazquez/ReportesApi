<?php

namespace App\Http\Controllers;

use App\Models\EquipmentStatus;
use App\Http\Requests\StoreEquipmentStatusRequest;
use App\Http\Requests\UpdateEquipmentStatusRequest;

class EquipmentStatusController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipmentStatus::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentStatus $equipmentStatus)
    {
        return $equipmentStatus->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentStatusRequest $request, EquipmentStatus $equipmentStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentStatus $equipmentStatus)
    {
        //
    }
}
