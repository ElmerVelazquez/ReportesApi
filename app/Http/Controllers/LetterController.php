<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Http\Requests\StoreLetterRequest;
use App\Http\Requests\UpdateLetterRequest;

class LetterController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Letter::get()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLetterRequest $request)
    {
        return Letter::create($request->all())->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        return $letter->toResource();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterRequest $request, Letter $letter)
    {
        $letter->update($request->all());
        return $letter->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letter $letter)
    {
        $letter->delete();
        return response()->json(null,204);
    }
}
