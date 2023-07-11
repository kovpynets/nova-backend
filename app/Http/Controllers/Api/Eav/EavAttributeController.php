<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttribute;
use Illuminate\Http\Request;

class EavAttributeController extends Controller
{
    public function index()
    {
        return EavAttribute::all();
    }

    public function store(Request $request)
    {
        $eavAttribute = EavAttribute::create($request->all());
        return $eavAttribute;
    }

    public function show(string $id)
    {
        return EavAttribute::find($id);
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
