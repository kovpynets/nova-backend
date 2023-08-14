<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeGroup;
use App\Models\Eav\EavAttributeSet;
use Illuminate\Http\Request;

class EavAttributeGroupController extends Controller
{

    public function index(EavAttributeSet $attributeSet)
    {
       // return $attributeSet->attributeGroups;
        return $attributeSet;
    }

    public function store(Request $request, $attributeSetId)
    {
        $data = $request->all();
        $data['attribute_set_id'] = $attributeSetId; // Добавьте это

        $attributeGroup = EavAttributeGroup::create($data);

        return response()->json($attributeGroup, 201);
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

    public function destroy(EavAttributeGroup $attributeGroup)
    {
        $attributeGroup->delete();
        return response(null, 204);
    }


}
