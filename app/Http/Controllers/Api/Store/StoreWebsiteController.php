<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\StoreWebsite;
use Illuminate\Http\Request;

class StoreWebsiteController extends Controller
{
    public function index()
    {
        return StoreWebsite::all();
    }

    public function store(Request $request)
    {
        $storeWebsite = StoreWebsite::create($request->all());
        return $storeWebsite;
    }

    public function show(string $id)
    {
        return StoreWebsite::find($id);
    }

    public function update(Request $request, string $id)
    {
        $storeWebsite = StoreWebsite::find($id);
        $storeWebsite->update($request->all());
        return $storeWebsite;
    }

    public function destroy(string $id)
    {
        $storeWebsite = StoreWebsite::find($id);
        $storeWebsite->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
