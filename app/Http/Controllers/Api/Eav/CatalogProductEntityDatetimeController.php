<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogProductEntityDatetimeController extends Controller
{
    public function index()
    {
        return CatalogProductEntityDatetime::all();
    }

    public function store(Request $request)
    {
        $productEntityDatetime = CatalogProductEntityDatetime::create($request->all());
        return $productEntityDatetime;
    }

    public function show(string $id)
    {
        return CatalogProductEntityDatetime::find($id);
    }

    public function update(Request $request, string $id)
    {
        $productEntityDatetime = CatalogProductEntityDatetime::find($id);
        $productEntityDatetime->update($request->all());
        return $productEntityDatetime;
    }

    public function destroy(string $id)
    {
        $productEntityDatetime = CatalogProductEntityDatetime::find($id);
        $productEntityDatetime->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
