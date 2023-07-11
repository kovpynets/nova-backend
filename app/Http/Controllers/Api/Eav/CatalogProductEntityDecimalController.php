<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogProductEntityDecimal;
use Illuminate\Http\Request;

class CatalogProductEntityDecimalController extends Controller
{
    public function index()
    {
        return CatalogProductEntityDecimal::all();
    }

    public function store(Request $request)
    {
        $productEntityDecimal = CatalogProductEntityDecimal::create($request->all());
        return $productEntityDecimal;
    }

    public function show(string $id)
    {
        return CatalogProductEntityDecimal::find($id);
    }

    public function update(Request $request, string $id)
    {
        $productEntityDecimal = CatalogProductEntityDecimal::find($id);
        $productEntityDecimal->update($request->all());
        return $productEntityDecimal;
    }

    public function destroy(string $id)
    {
        $productEntityDecimal = CatalogProductEntityDecimal::find($id);
        $productEntityDecimal->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
