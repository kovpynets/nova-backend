<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavEntityAttribute;
use Illuminate\Http\Request;

class EavEntityAttributeController extends Controller
{
    public function index()
    {
        return EavEntityAttribute::all();
    }

    public function store(Request $request)
    {
        $eavEntityAttribute = EavEntityAttribute::create($request->all());
        return $eavEntityAttribute;
    }

    public function show(string $id)
    {
        return EavEntityAttribute::find($id);
    }

    public function update(Request $request, string $id)
    {
        $eavEntityAttribute = EavEntityAttribute::find($id);
        $eavEntityAttribute->update($request->all());
        return $eavEntityAttribute;
    }

    public function destroy(string $id)
    {
        $eavEntityAttribute = EavEntityAttribute::find($id);
        $eavEntityAttribute->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
