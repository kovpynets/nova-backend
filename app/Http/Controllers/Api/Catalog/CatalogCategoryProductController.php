<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogCategoryProduct;
use Illuminate\Http\Request;

class CatalogCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogCategoryProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryProduct = CatalogCategoryProduct::create($request->all());
        return $categoryProduct;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CatalogCategoryProduct::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryProduct = CatalogCategoryProduct::find($id);
        $categoryProduct->update($request->all());
        return $categoryProduct;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryProduct = CatalogCategoryProduct::find($id);
        $categoryProduct->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
