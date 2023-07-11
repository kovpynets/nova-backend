<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogProductEntity;
use Illuminate\Http\Request;

class CatalogProductEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogProductEntity::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productEntity = CatalogProductEntity::create($request->all());
        return $productEntity;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CatalogProductEntity::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productEntity = CatalogProductEntity::find($id);
        $productEntity->update($request->all());
        return $productEntity;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productEntity = CatalogProductEntity::find($id);
        $productEntity->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
