<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttribute;
use App\Models\Eav\EavAttributeSet;
use Illuminate\Http\Request;

class EavAttributeSetController extends Controller
{
    public function index()
    {
        // Загружаем все наборы атрибутов вместе с их группами атрибутов и атрибутами
        $attributeSets = EavAttributeSet::with(['attributeGroups', 'attributes'])->get();
        return response()->json($attributeSets);
    }


    public function store(Request $request)
    {
        $eavAttributeSet = EavAttributeSet::create($request->all());
        return $eavAttributeSet;
    }

    public function show(EavAttributeSet $attributeSet)
    {
        return $attributeSet;
    }


    public function getAttribute(int $id)
    {
        return EavAttributeSet::find($id);
    }

    public function update(Request $request, string $id)
    {
        $eavAttributeSet = EavAttributeSet::find($id);
        $eavAttributeSet->update($request->all());
        return $eavAttributeSet;
    }

    public function destroy(EavAttributeSet $attributeSetId)
    {
        $attributeSetId->delete();
        return response(null, 204);
    }

    public function attributeGroups(EavAttributeSet $attributeSet)
    {
        return $attributeSet->attributeGroups;
    }

    public function getAttributes($attributeSetId)
    {
        $attributeSet = EavAttributeSet::with('attributes')->find($attributeSetId);

        if (!$attributeSet) {
            return response()->json(['message' => 'Attribute set not found'], 404);
        }

        return response()->json($attributeSet->attributes);
    }


    public function addAttribute(EavAttributeSet $attributeSet, EavAttribute $attribute)
    {
        if(!$attributeSet->attributes->contains($attribute)) {
            $attributeSet->entityAttributes()->create(['attribute_id' => $attribute->id]);
        }
        return response(null, 201);
    }

    public function removeAttribute(EavAttributeSet $attributeSet, EavAttribute $attribute)
    {
        $entityAttribute = $attributeSet->entityAttributes()->where('attribute_id', $attribute->id)->first();
        if($entityAttribute) {
            $entityAttribute->delete();
        }
        return response(null, 204);
    }
}
