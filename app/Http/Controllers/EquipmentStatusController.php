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
        return EquipmentStatus::create($request->all())->toResource()->response()->setStatusCode(201);
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
        $equipmentStatus->update($request->all());
        return $equipmentStatus->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentStatus $equipmentStatus)
    {
        $equipmentStatus->delete();
        return response()->json(null,204);
    }
}
