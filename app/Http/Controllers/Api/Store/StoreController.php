<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        //return Store::all();
        $stores = Store::with('website', 'group')->get();
        return $stores;
    }

    public function store(Request $request)
    {
        $store = Store::create($request->all());
        return $store;
    }

    public function show(string $id)
    {
        return Store::find($id);
    }

    public function update(Request $request, string $id)
    {
        $store = Store::find($id);
        $store->update($request->all());
        return $store;
    }

    public function destroy(int $id)
    {
        $store = Store::find($id);

        if ($store) {
            $store->delete();
            return $store; // Или можно вернуть любой другой ответ, который вы хотите отправить обратно
        } else {
            return response()->json(['error' => 'Store not found'], 404);
        }
    }


}
