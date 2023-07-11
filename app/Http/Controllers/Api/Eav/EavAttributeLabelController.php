<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeLabel;
use Illuminate\Http\Request;

class EavAttributeLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavAttributeLabel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributeLabel = EavAttributeLabel::create($request->all());
        return $attributeLabel;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavAttributeLabel::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributeLabel = EavAttributeLabel::find($id);
        $attributeLabel->update($request->all());
        return $attributeLabel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attributeLabel = EavAttributeLabel::find($id);
        $attributeLabel->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
