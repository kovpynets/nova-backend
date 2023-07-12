<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeOptionValue;
use Illuminate\Http\Request;

class EavAttributeOptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // return EavAttributeOptionValue::with('option')->get();
        return EavAttributeOptionValue::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eavAttributeOptionValue = EavAttributeOptionValue::create($request->all());
        return $eavAttributeOptionValue;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return EavAttributeOptionValue::with('option')->find($id);
        return EavAttributeOptionValue::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eavAttributeOptionValue = EavAttributeOptionValue::find($id);
        $eavAttributeOptionValue->update($request->all());
        return $eavAttributeOptionValue;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eavAttributeOptionValue = EavAttributeOptionValue::find($id);
        $eavAttributeOptionValue->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
