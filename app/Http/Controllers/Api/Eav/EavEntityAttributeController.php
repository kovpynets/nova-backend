<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavEntityAttribute;
use Illuminate\Http\Request;

class EavEntityAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavEntityAttribute::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entityAttribute = EavEntityAttribute::create($request->all());
        return $entityAttribute;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavEntityAttribute::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $entityAttribute = EavEntityAttribute::find($id);
        $entityAttribute->update($request->all());
        return $entityAttribute;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entityAttribute = EavEntityAttribute::find($id);
        $entityAttribute->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
