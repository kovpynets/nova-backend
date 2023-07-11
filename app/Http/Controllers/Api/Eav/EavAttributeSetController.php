<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeSet;
use Illuminate\Http\Request;

class EavAttributeSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavAttributeSet::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributeSet = EavAttributeSet::create($request->all());
        return $attributeSet;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavAttributeSet::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributeSet = EavAttributeSet::find($id);
        $attributeSet->update($request->all());
        return $attributeSet;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attributeSet = EavAttributeSet::find($id);
        $attributeSet->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
