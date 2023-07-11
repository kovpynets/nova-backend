<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogCategoryEntity;
use Illuminate\Http\Request;

class CatalogCategoryEntityController extends Controller
{
    public function index()
    {
        return CatalogCategoryEntity::all();
    }

    public function store(Request $request)
    {
        $categoryEntity = CatalogCategoryEntity::create($request->all());
        return $categoryEntity;
    }

    public function show(string $id)
    {
        return CatalogCategoryEntity::find($id);
    }

    public function update(Request $request, string $id)
    {
        $categoryEntity = CatalogCategoryEntity::find($id);
        $categoryEntity->update($request->all());
        return $categoryEntity;
    }

    public function destroy(string $id)
    {
        $categoryEntity = CatalogCategoryEntity::find($id);
        $categoryEntity->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
