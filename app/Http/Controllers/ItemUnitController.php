<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ItemUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $itemUnits = ItemUnit::with('item')->simplePaginate(10);
        return view('item_units.index', compact('itemUnits'));
    }

    public function create()
    {
        $items = Item::all();
        return view('item_units.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id' => 'required|exists:items,id',
            'condition' => 'required|in:bagus,rusak,perlu perbaikan,dalam perbaikan',
        ]);

        do {
            $number = mt_rand(1000000000, 9999999999);
        } while($this->unitCodeExists($number));


        $validatedData['unit_code'] = $number;
        // dd($validatedData);
        ItemUnit::create($validatedData);

        return redirect()->route('item-units.index')
                         ->with('success', 'Item Unit Created successfully');
    }

    private function unitCodeExists($code)
    {
        return ItemUnit::where('unit_code', $code)->exists();

    }

    public function show(ItemUnit $itemUnit)
    {
        return view('item_units.show',compact('itemUnit'));
    }


    public function edit(ItemUnit $itemUnit)
    {
        $items = Item::all();
        return view('item_units.edit',compact('itemUnit', 'items'));
    }

    public function update(Request $request, ItemUnit $itemUnit)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        $itemUnit->update($request->all());

        return redirect()->route('item-units.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(ItemUnit $itemUnit)
    {
        $itemUnit->delete();

        return redirect()->route('item-units.index')
                         ->with('success','Item Unit deleted successfully');
    }
}
