<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavEntityType;
use Illuminate\Http\Request;

class EavEntityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavEntityType::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entityType = EavEntityType::create($request->all());
        return $entityType;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavEntityType::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $entityType = EavEntityType::find($id);
        $entityType->update($request->all());
        return $entityType;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entityType = EavEntityType::find($id);
        $entityType->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
