<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogCategoryProduct;
use Illuminate\Http\Request;

class CatalogCategoryProductController extends Controller
{
    public function index()
    {
        return CatalogCategoryProduct::all();
    }

    public function store(Request $request)
    {
        $categoryProduct = CatalogCategoryProduct::create($request->all());
        return $categoryProduct;
    }

    public function show(string $id)
    {
        return CatalogCategoryProduct::find($id);
    }

    public function update(Request $request, string $id)
    {
        $categoryProduct = CatalogCategoryProduct::find($id);
        $categoryProduct->update($request->all());
        return $categoryProduct;
    }

    public function destroy(string $id)
    {
        $categoryProduct = CatalogCategoryProduct::find($id);
        $categoryProduct->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
