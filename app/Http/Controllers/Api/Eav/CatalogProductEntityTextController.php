<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogProductEntityText;
use Illuminate\Http\Request;

class CatalogProductEntityTextController extends Controller
{
    public function index()
    {
        return CatalogProductEntityText::all();
    }

    public function store(Request $request)
    {
        $productEntityText = CatalogProductEntityText::create($request->all());
        return $productEntityText;
    }

    public function show(string $id)
    {
        return CatalogProductEntityText::find($id);
    }

    public function update(Request $request, string $id)
    {
        $productEntityText = CatalogProductEntityText::find($id);
        $productEntityText->update($request->all());
        return $productEntityText;
    }

    public function destroy(string $id)
    {
        $productEntityText = CatalogProductEntityText::find($id);
        $productEntityText->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
