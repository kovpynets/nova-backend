<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\StoreGroup;
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
        $storeGroup = StoreGroup::create($request->all());
        return $storeGroup;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return StoreGroup::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $storeGroup = StoreGroup::find($id);
        $storeGroup->update($request->all());
        return $storeGroup;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storeGroup = StoreGroup::find($id);
        $storeGroup->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
