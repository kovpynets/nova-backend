<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatalogCategoryProduct;
use Illuminate\Http\Request;

class CatalogCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryProducts = CatalogCategoryProduct::all();
        return response()->json($categoryProducts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryProduct = CatalogCategoryProduct::create($request->all());
        return response()->json($categoryProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoryProduct = CatalogCategoryProduct::findOrFail($id);
        return response()->json($categoryProduct, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryProduct = CatalogCategoryProduct::findOrFail($id);
        $categoryProduct->update($request->all());
        return response()->json($categoryProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryProduct = CatalogCategoryProduct::findOrFail($id);
        $categoryProduct->delete();
        return response()->json(null, 204);
    }
}
