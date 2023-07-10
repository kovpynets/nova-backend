<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatalogCategoryEntity;
use Illuminate\Http\Request;

class CatalogCategoryEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CatalogCategoryEntity::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = CatalogCategoryEntity::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = CatalogCategoryEntity::findOrFail($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = CatalogCategoryEntity::findOrFail($id);
        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CatalogCategoryEntity::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
