<?php

namespace App\Http\Controllers;

use App\Models\RegisterType;
use App\Http\Requests\StoreRegisterTypeRequest;
use App\Http\Requests\UpdateRegisterTypeRequest;

class RegisterTypeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RegisterType::paginate(10)->toResourceCollection();
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisterType $registerType)
    {
        return $registerType->toResource();
    }

}
