<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatalogCategoryProduct;
use Illuminate\Http\Request;

class CatalogProductEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = CatalogCategoryProduct::all();
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = CatalogCategoryProduct::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = CatalogCategoryProduct::findOrFail($id);
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = CatalogCategoryProduct::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = CatalogCategoryProduct::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
