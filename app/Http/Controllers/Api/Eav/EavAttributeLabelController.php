<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttributeLabel;
use Illuminate\Http\Request;

class EavAttributeLabelController extends Controller
{
    public function index()
    {
        return EavAttributeLabel::all();
    }

    public function store(Request $request)
    {
        $eavAttributeLabel = EavAttributeLabel::create($request->all());
        return $eavAttributeLabel;
    }

    public function show(string $id)
    {
        return EavAttributeLabel::find($id);
    }

    public function update(Request $request, string $id)
    {
        $eavAttributeLabel = EavAttributeLabel::find($id);
        $eavAttributeLabel->update($request->all());
        return $eavAttributeLabel;
    }

    public function destroy(string $id)
    {
        $eavAttributeLabel = EavAttributeLabel::find($id);
        $eavAttributeLabel->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
