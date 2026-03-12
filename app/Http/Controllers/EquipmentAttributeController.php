<?php

namespace App\Http\Controllers;

use App\Models\EquipmentAttribute;
use App\Http\Requests\StoreEquipmentAttributeRequest;
use App\Http\Requests\UpdateEquipmentAttributeRequest;

class EquipmentAttributeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipmentAttribute::with('equipmentType')->paginate(10)->toResourceCollection();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentAttributeRequest $request)
    {
        return EquipmentAttribute::create($request->all())->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentAttribute $equipmentAttribute)
    {
        return $equipmentAttribute->load('attributeValues')->toResource();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentAttributeRequest $request, EquipmentAttribute $equipmentAttribute)
    {
        $equipmentAttribute->update($request->all());
        return $equipmentAttribute->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentAttribute $equipmentAttribute)
    {
        $equipmentAttribute->delete();
        return response()->json(null,204);
    }
}
