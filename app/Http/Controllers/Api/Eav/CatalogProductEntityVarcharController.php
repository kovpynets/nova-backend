<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Catalog\CatalogProductEntityVarchar;
use Illuminate\Http\Request;

class CatalogProductEntityVarcharController extends Controller
{
    public function index()
    {
        return CatalogProductEntityVarchar::all();
    }

    public function store(Request $request)
    {
        $productEntityVarchar = CatalogProductEntityVarchar::create($request->all());
        return $productEntityVarchar;
    }

    public function show(string $id)
    {
        return CatalogProductEntityVarchar::find($id);
    }

    public function update(Request $request, string $id)
    {
        $productEntityVarchar = CatalogProductEntityVarchar::find($id);
        $productEntityVarchar->update($request->all());
        return $productEntityVarchar;
    }

    public function destroy(string $id)
    {
        $productEntityVarchar = CatalogProductEntityVarchar::find($id);
        $productEntityVarchar->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
