<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavEntityType;
use Illuminate\Http\Request;

class EavEntityTypeController extends Controller
{
    public function index()
    {
        return EavEntityType::all();
    }

    public function store(Request $request)
    {
        $eavEntityType = EavEntityType::create($request->all());
        return $eavEntityType;
    }

    public function show(string $id)
    {
        return EavEntityType::find($id);
    }

    public function update(Request $request, string $id)
    {
        $eavEntityType = EavEntityType::find($id);
        $eavEntityType->update($request->all());
        return $eavEntityType;
    }

    public function destroy(string $id)
    {
        $eavEntityType = EavEntityType::find($id);
        $eavEntityType->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
