<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttribute;
use Illuminate\Http\Request;

class EavAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavAttribute::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attribute = EavAttribute::create($request->all());
        return $attribute;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavAttribute::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attribute = EavAttribute::find($id);
        $attribute->update($request->all());
        return $attribute;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = EavAttribute::find($id);
        $attribute->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
