<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeSet;
use Illuminate\Http\Request;

class EavAttributeSetController extends Controller
{
    public function index()
    {
        return EavAttributeSet::all();
    }

    public function store(Request $request)
    {
        $eavAttributeSet = EavAttributeSet::create($request->all());
        return $eavAttributeSet;
    }

    public function show(string $id)
    {
        return EavAttributeSet::find($id);
    }

    public function update(Request $request, string $id)
    {
        $eavAttributeSet = EavAttributeSet::find($id);
        $eavAttributeSet->update($request->all());
        return $eavAttributeSet;
    }

    public function destroy(string $id)
    {
        $eavAttributeSet = EavAttributeSet::find($id);
        $eavAttributeSet->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
