<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Http\Requests\StoreEquipmentTypeRequest;
use App\Http\Requests\UpdateEquipmentTypeRequest;

class EquipmentTypeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipmentType::with('attributes')->get()->toResourceCollection();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentTypeRequest $request)
    {
        $equipmentType = EquipmentType::create($request->all());
        return $equipmentType->toresource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentType $equipmentType)
    {
        return $equipmentType->load('attributes')->toResource();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentTypeRequest $request, EquipmentType $equipmentType)
    {
        $equipmentType->update($request->all());
        return $equipmentType->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentType $equipmentType)
    {
        $equipmentType->delete();

        return response()->json(null,204);
    }
}
