<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeOption;
use App\Models\Eav\EavAttributeOptionValue;
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

        // If there are values, store them as well
        if($request->has('values')) {
            foreach($request->get('values') as $value) {
                EavAttributeOptionValue::create([
                    'option_id' => $eavAttributeOption->id,
                    'locale' => $value['locale'],
                    'value' => $value['value']
                ]);
            }
        }

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
        $eavAttributeOption = EavAttributeOption::with('values')->find($id);
        $eavAttributeOption->update($request->all());

        // If there are values, update them as well
        if($request->has('values')) {
            foreach($request->get('values') as $value) {
                $optionValue = EavAttributeOptionValue::where('option_id', $eavAttributeOption->id)
                    ->where('locale', $value['locale'])
                    ->first();
                if($optionValue) {
                    $optionValue->update(['value' => $value['value']]);
                }
            }
        }

        return $eavAttributeOption;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eavAttributeOption = EavAttributeOption::with('values')->find($id);

        // Delete the option values as well
        foreach($eavAttributeOption->values as $value) {
            $value->delete();
        }

        $eavAttributeOption->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
