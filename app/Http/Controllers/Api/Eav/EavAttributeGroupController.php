<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeGroup;
use Illuminate\Http\Request;

class EavAttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavAttributeGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributeGroup = EavAttributeGroup::create($request->all());
        return $attributeGroup;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavAttributeGroup::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributeGroup = EavAttributeGroup::find($id);
        $attributeGroup->update($request->all());
        return $attributeGroup;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attributeGroup = EavAttributeGroup::find($id);
        $attributeGroup->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
