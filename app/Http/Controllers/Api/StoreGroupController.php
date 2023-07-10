<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreGroup;
use Illuminate\Http\Request;

class StoreGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StoreGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeGroupe = StoreGroup::create($request->all());
        return response()->json($storeGroupe, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = StoreGroup::findOrFail($id);
        return $store;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $storeGroupe = StoreGroup::findOrFail($id);
        $storeGroupe->update($request->all());
        return response()->json($storeGroupe, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = StoreGroup::findOrFail($id);
        if($store->delete()) {
            return $store;
        }
    }
}
