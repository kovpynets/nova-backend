<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttribute;
use App\Models\Eav\EavAttributeLabel;
use Illuminate\Http\Request;

class EavAttributeController extends Controller
{
    public function index()
    {
        //return EavAttribute::all();
        return EavAttribute::with('attributeLabels')->get();
    }

    public function store(Request $request)
    {
        // Получите данные атрибута и данных меток из запроса
        $eavAttributeData = $request->get('eavAttribute');
        $eavAttributeLabelData = $eavAttributeData['attribute_labels'] ?? [];

        try {
            // Создайте и сохраните атрибут
            $eavAttribute = EavAttribute::create($eavAttributeData);

            // Если предоставлены данные метки, создайте и сохраните каждую метку
            if (!empty($eavAttributeLabelData)) {
                foreach ($eavAttributeLabelData as $labelData) {
                    // Если label или locale пусты, пропустите итерацию
                    if (empty($labelData['label']) || empty($labelData['locale'])) {
                        continue;
                    }

                    // Добавьте атрибуту его ID
                    $labelData['attribute_id'] = $eavAttribute->id;

                    // Создайте и сохраните метку
                    EavAttributeLabel::create($labelData);
                }
            }

            // Перезагрузите атрибут со связанными данными для возвращения
            $eavAttribute->load('attributeLabels');
        } catch (\Exception $e) {
            // В случае ошибки верните сообщение об ошибке
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
        $eavAttribute = EavAttribute::find($id);
        $eavAttribute->update($request->all());
        return $eavAttribute;
    }

    public function destroy(string $id)
    {
        $eavAttribute = EavAttribute::find($id);
        $eavAttribute->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
