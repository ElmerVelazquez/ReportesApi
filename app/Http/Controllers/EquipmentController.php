<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApiResource;

#[UseResource(ApiResource::class)]
class EquipmentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DB::enableQueryLog();
        return Equipment::with('attributeValues.attribute,register')->paginate(10)->toResourceCollection();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentRequest $request)
    {
        return  Equipment::create($request->all())->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        return Equipment::with('attributeValues.attribute,register')->findOrFail($equipment)->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->all());
        return $equipment->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return response()->json(null,204);
    }
}
