<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttribute;
use App\Models\Eav\EavAttributeLabel;
use App\Models\Eav\EavAttributeOption;
use App\Models\Eav\EavAttributeOptionValue;
use Illuminate\Http\Request;

class EavAttributeController extends Controller
{
    public function index()
    {
        return EavAttribute::with('attributeLabels')->get();
    }

    public function store(Request $request)
    {
        $eavAttributeData = $request->get('eavAttribute');
        $eavAttributeLabelData = $eavAttributeData['attribute_labels'] ?? [];
        try {
            $eavAttribute = EavAttribute::create($eavAttributeData);
            if (!empty($eavAttributeLabelData)) {
                foreach ($eavAttributeLabelData as $labelData) {
                    if (empty($labelData['label']) || empty($labelData['locale'])) {
                        continue;
                    }
                    $labelData['attribute_id'] = $eavAttribute->id;
                    EavAttributeLabel::create($labelData);
                }
            }
            $eavAttribute->load('attributeLabels');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create EavAttribute: ' . $e->getMessage() . ', Trace: ' . $e->getTraceAsString()], 500);
        }

        return response()->json(['eavAttribute' => $eavAttribute], 201);
    }
    public function show(string $id)
    {
        return EavAttribute::with('attributeLabels')->find($id);
    }
    public function update(Request $request, string $id)
    {
        $eavAttributeData = $request->get('eavAttribute');
        $eavAttributeLabelData = $eavAttributeData['attribute_labels'] ?? [];
        $eavAttribute = EavAttribute::find($id);
        $eavAttribute->update($eavAttributeData);
        if (!empty($eavAttributeLabelData)) {
            foreach ($eavAttributeLabelData as $labelData) {
                if (empty($labelData['label']) || empty($labelData['locale'])) {
                    continue;
                }
                if (isset($labelData['id'])) {
                    EavAttributeLabel::where('id', $labelData['id'])
                        ->update(['label' => $labelData['label']]);
                } else {
                    EavAttributeLabel::create([
                        'attribute_id' => $eavAttribute->id,
                        'locale' => $labelData['locale'],
                        'label' => $labelData['label']
                    ]);
                }
            }
        }
        $eavAttribute->load('attributeLabels');
        return $eavAttribute;
    }
    public function destroy(string $id)
    {
        $eavAttribute = EavAttribute::find($id);
        $eavAttribute->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }


    public function getOptionsByAttribute(int $attributeId)
    {
        return EavAttributeOption::where('attribute_id', $attributeId)->with('values')->get();
    }

    public function getOptionByAttribute(int $attributeId, int $optionId)
    {
        $attribute = EavAttribute::find($attributeId);
        if (!$attribute) {
            return response()->json(['message' => 'Attribute not found'], 404);
        }
        $option = EavAttributeOption::where('attribute_id', $attributeId)
            ->where('id', $optionId)
            ->first();
        if (!$option) {
            return response()->json(['message' => 'Option not found'], 404);
        }
        return response()->json($option);
    }

    public function storeOptionForAttribute(Request $request, int $attributeId)
    {
        $sortOrder = $request->get('sort_order', 0);

        $eavAttributeOption = EavAttributeOption::create([
            'attribute_id' => $attributeId,
            'sort_order' => $sortOrder,
        ]);
        if ($request->has('values')) {
            foreach ($request->get('values') as $value) {
                EavAttributeOptionValue::create([
                    'option_id' => $eavAttributeOption->id,
                    'locale' => $value['locale'],
                    'value' => $value['value'],
                ]);
            }
        }
        return $eavAttributeOption;
    }

    public function updateOptionForAttribute(Request $request, int $attributeId, int $optionId)
    {
        $eavAttributeOption = EavAttributeOption::where('attribute_id', $attributeId)->findOrFail($optionId);
        $eavAttributeOption->update($request->all());

        // If there are values, update them as well
        if ($request->has('values')) {
            foreach ($request->get('values') as $value) {
                $optionValue = EavAttributeOptionValue::where('option_id', $eavAttributeOption->id)
                    ->where('locale', $value['locale'])
                    ->first();
                if ($optionValue) {
                    $optionValue->update(['value' => $value['value']]);
                }
            }
        }

        return $eavAttributeOption;
    }

    public function deleteOptionForAttribute(int $attributeId, int $optionId)
    {
        $eavAttributeOption = EavAttributeOption::where('attribute_id', $attributeId)->findOrFail($optionId);

        // Delete the option values as well
        foreach ($eavAttributeOption->values as $value) {
            $value->delete();
        }

        $eavAttributeOption->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }

    public function getValuesForOption(int $attributeId, int $optionId)
    {
        $option = EavAttributeOption::where('attribute_id', $attributeId)
            ->where('id', $optionId)
            ->with('values')
            ->first();

        if (!$option) {
            return response()->json(['message' => 'Option not found'], 404);
        }

        return response()->json($option->values);
    }

    public function storeValueForOption(Request $request, int $attributeId, int $optionId)
    {
        $option = EavAttributeOption::where('attribute_id', $attributeId)
            ->where('id', $optionId)
            ->first();

        if (!$option) {
            return response()->json(['message' => 'Option not found'], 404);
        }

        $value = EavAttributeOptionValue::create([
            'option_id' => $option->id,
            'locale' => $request->input('locale'),
            'value' => $request->input('value'),
        ]);

        return response()->json($value);
    }

    public function updateValueForOption(Request $request, int $attributeId, int $optionId, int $valueId)
    {
        $value = EavAttributeOptionValue::where('option_id', $optionId)
            ->where('id', $valueId)
            ->first();

        if (!$value) {
            return response()->json(['message' => 'Value not found'], 404);
        }

        $value->update($request->all());

        return response()->json($value);
    }

    public function deleteValueForOption(int $attributeId, int $optionId, int $valueId)
    {
        $value = EavAttributeOptionValue::where('option_id', $optionId)
            ->where('id', $valueId)
            ->first();

        if (!$value) {
            return response()->json(['message' => 'Value not found'], 404);
        }

        $value->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }



}
