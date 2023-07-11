<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogProductEntity;
use Illuminate\Http\Request;

class CatalogProductEntityController extends Controller
{
    public function index()
    {
        return CatalogProductEntity::all();
    }

    public function store(Request $request)
    {
        $productEntity = CatalogProductEntity::create($request->all());
        return $productEntity;
    }

    public function show(string $id)
    {
        return CatalogProductEntity::find($id);
    }

    public function update(Request $request, string $id)
    {
        $productEntity = CatalogProductEntity::find($id);
        $productEntity->update($request->all());
        return $productEntity;
    }

    public function destroy(string $id)
    {
        $productEntity = CatalogProductEntity::find($id);
        $productEntity->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
