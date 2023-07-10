<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreWebsite;
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
        return response()->json($storeWebsite, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $website = StoreWebsite::findOrFail($id);
        return $website;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $storeWebsite = StoreWebsite::findOrFail($id);
        $storeWebsite->update($request->all());
        return response()->json($storeWebsite, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $website = StoreWebsite::findOrFail($id);
        if($website->delete()) {
            return $website;
        }
    }
}
