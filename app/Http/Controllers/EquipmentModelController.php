<?php

namespace App\Http\Controllers;

use App\Models\EquipmentModel;
use App\Http\Requests\StoreEquipmentModelRequest;
use App\Http\Requests\UpdateEquipmentModelRequest;

class EquipmentModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipmentModel::with('brand')->paginate(10)->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentModelRequest $request)
    {
        return EquipmentModel::create($request->all())->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentModel $equipmentModel)
    {
        return $equipmentModel->load('brand')->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentModelRequest $request, EquipmentModel $equipmentModel)
    {
        $equipmentModel->update($request->all());
        return $equipmentModel->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentModel $equipmentModel)
    {
        $equipmentModel->delete();
        return response()->json(null,204);
    }
}
