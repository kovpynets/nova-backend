<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogProductEntityInt;
use Illuminate\Http\Request;

class CatalogProductEntityIntController extends Controller
{
    public function index()
    {
        return CatalogProductEntityInt::all();
    }

    public function store(Request $request)
    {
        $productEntityInt = CatalogProductEntityInt::create($request->all());
        return $productEntityInt;
    }

    public function show(string $id)
    {
        return CatalogProductEntityInt::find($id);
    }

    public function update(Request $request, string $id)
    {
        $productEntityInt = CatalogProductEntityInt::find($id);
        $productEntityInt->update($request->all());
        return $productEntityInt;
    }

    public function destroy(string $id)
    {
        $productEntityInt = CatalogProductEntityInt::find($id);
        $productEntityInt->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
