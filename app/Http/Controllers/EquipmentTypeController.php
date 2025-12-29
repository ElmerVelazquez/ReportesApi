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
        return  response()->json(EquipmentType::with('attributes')->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentTypeRequest $request)
    {
        EquipmentType::Find('1')->attributes()->sync([1,2,3]);
       //$equipmentType->attributes()->attach($request->input('attributes'));
       return EquipmentType::find('1')->attributes[0]->pivot;
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentType $equipmentType)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentTypeRequest $request, EquipmentType $equipmentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentType $equipmentType)
    {
        //
    }
}
