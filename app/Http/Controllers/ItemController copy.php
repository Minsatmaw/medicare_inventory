<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\Itemcategory;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('itemcategory', 'supplier', 'location', 'department')->get();
        return view('items.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemcategories = Itemcategory::all();
        $suppliers = Supplier::all();
        $locations = Location::all();
        $departments = Department::all();
        return view('items.create', compact('itemcategories', 'suppliers', 'locations', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $request->validate([
            'stock' => 'required',
            'itemcategory_id' => 'required',
            'supplier_id' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $items = Item::with('itemcategory', 'supplier', 'location', 'department')->get();

        return view('items.show', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $suppliers = Supplier::all();
        $itemcategories = Itemcategory::all();
        $locations = Location::all();
        $departments = Department::all();

        return view('items.edit', compact('item', 'itemcategories', 'locations', 'suppliers', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $request->validate([
            'stock' => 'required',
            'itemcategory_id' => 'required',
            'supplier_id' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
