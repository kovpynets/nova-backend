<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeOption;
use Illuminate\Http\Request;

class EavAttributeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavAttributeOption::with('values')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eavAttributeOption = EavAttributeOption::create($request->all());
        return $eavAttributeOption;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavAttributeOption::with('values')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eavAttributeOption = EavAttributeOption::find($id);
        $eavAttributeOption->update($request->all());
        return $eavAttributeOption;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eavAttributeOption = EavAttributeOption::find($id);
        $eavAttributeOption->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
