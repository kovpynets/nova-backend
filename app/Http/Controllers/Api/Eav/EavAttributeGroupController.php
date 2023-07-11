<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeGroup;
use Illuminate\Http\Request;

class EavAttributeGroupController extends Controller
{
    public function index()
    {
        return EavAttributeGroup::all();
    }

    public function store(Request $request)
    {
        $eavAttributeGroup = EavAttributeGroup::create($request->all());
        return $eavAttributeGroup;
    }

    public function show(string $id)
    {
        return EavAttributeGroup::find($id);
    }

    public function update(Request $request, string $id)
    {
        $eavAttributeGroup = EavAttributeGroup::find($id);
        $eavAttributeGroup->update($request->all());
        return $eavAttributeGroup;
    }

    public function destroy(string $id)
    {
        $eavAttributeGroup = EavAttributeGroup::find($id);
        $eavAttributeGroup->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
