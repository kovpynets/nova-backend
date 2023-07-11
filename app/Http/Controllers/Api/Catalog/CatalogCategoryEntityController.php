<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogCategoryEntity;
use Illuminate\Http\Request;

class CatalogCategoryEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogCategoryEntity::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryEntity = CatalogCategoryEntity::create($request->all());
        return $categoryEntity;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CatalogCategoryEntity::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryEntity = CatalogCategoryEntity::find($id);
        $categoryEntity->update($request->all());
        return $categoryEntity;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryEntity = CatalogCategoryEntity::find($id);
        $categoryEntity->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
