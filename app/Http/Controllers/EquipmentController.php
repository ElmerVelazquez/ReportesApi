<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use Illuminate\Support\Facades\DB;

class EquipmentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DB::enableQueryLog();
        return Equipment::with('attributeValues.attribute,register')->get()->toResourceCollection();
;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentRequest $request)
    {
        return  Equipment::create($request->all())->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Equipment::with('attributeValues.attribute,register')->findOrFail($id)->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
