<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\StoreGroup;
use Illuminate\Http\Request;

class StoreGroupController extends Controller
{
    public function index()
    {
        return StoreGroup::all();
    }

    public function store(Request $request)
    {
        $storeGroup = StoreGroup::create($request->all());
        return $storeGroup;
    }

    public function show(string $id)
    {
        return StoreGroup::find($id);
    }

    public function update(Request $request, string $id)
    {
        $storeGroup = StoreGroup::find($id);
        $storeGroup->update($request->all());
        return $storeGroup;
    }

    public function destroy(string $id)
    {
        $storeGroup = StoreGroup::find($id);
        $storeGroup->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
