<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\StoreWebsite;
use Illuminate\Http\Request;

class StoreWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StoreWebsite::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeWebsite = StoreWebsite::create($request->all());
        return $storeWebsite;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return StoreWebsite::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $storeWebsite = StoreWebsite::find($id);
        $storeWebsite->update($request->all());
        return $storeWebsite;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storeWebsite = StoreWebsite::find($id);
        $storeWebsite->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
