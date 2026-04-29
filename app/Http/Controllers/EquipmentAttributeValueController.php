<?php

namespace App\Http\Controllers;

use App\Models\EquipmentAttributeValue;
use App\Http\Requests\StoreEquipmentAttributeValueRequest;
use App\Http\Requests\UpdateEquipmentAttributeValueRequest;

class EquipmentAttributeValueController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipmentAttributeValue::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentAttributeValueRequest $request)
    {
        return EquipmentAttributeValue::create($request->all())->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentAttributeValue $equipmentAttributeValue)
    {
        return $equipmentAttributeValue->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentAttributeValueRequest $request, EquipmentAttributeValue $equipmentAttributeValue)
    {
        $equipmentAttributeValue->update($request->all());
        return $equipmentAttributeValue->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentAttributeValue $equipmentAttributeValue)
    {
        $equipmentAttributeValue->delete();
        return response()->json(null,204);
    }
}
