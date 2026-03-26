<?php

namespace App\Http\Controllers;

use App\Models\EquipmentBrand;
use App\Http\Requests\StoreEquipmentBrandRequest;
use App\Http\Requests\UpdateEquipmentBrandRequest;

class EquipmentBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipmentBrand::paginate(10)->toResourceCollection();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentBrandRequest $request)
    {
        return EquipmentBrand::create($request->all())->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentBrand $equipmentBrand)
    {
        return $equipmentBrand->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentBrandRequest $request, EquipmentBrand $equipmentBrand)
    {
        $equipmentBrand->update($request->all());
        return $equipmentBrand->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentBrand $equipmentBrand)
    {
        $equipmentBrand->delete();
        return response()->json(null,204);
    }
}
