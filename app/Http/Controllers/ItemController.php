<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\Itemcategory;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('itemcategory', 'supplier', 'location', 'department')->paginate(10);
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

    public function getRelatedItems($departmentId)
    {
        $relatedItems = Item::where('department_id', $departmentId)->get();
        ddd($relatedItems);

        return response()->json($relatedItems);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        // $request->validate([
        //     'code' => 'required',
        //     'name' => 'required',
        //     'itemcategory_id' => 'nullable',
        //     'supplier_id' => 'nullable',
        //     'location_id' => 'required',
        //     'department_id' => 'required',
        // ]);

        // $query = Item::where('code', '111101')
        //                 ->where('department_id', $request->department_id )->get();

        $data = [
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'location_id' => $request->input('location_id'),
            'department_id' => $request->input('department_id'),
        ];

        if ($request->filled('itemcategory_id')) {
            $data['itemcategory_id'] = $request->input('itemcategory_id');
        }

        if ($request->filled('supplier_id')) {
            $data['supplier_id'] = $request->input('supplier_id');
        }

        Item::create($data);

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

        return view('items.edit', compact('item', 'itemcategories', 'suppliers', 'locations', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $request->validate([
            'code' => 'required|unique:items,code,' .  $item->id,
            'name' => 'required|unique:items,name,' . $item->id,
            'itemcategory_id' => 'nullable',
            'supplier_id' => 'nullable',
            'location_id' => 'required',
            'department_id' => 'required',
        ]);

        $data = [
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'location_id' => $request->input('location_id'),
            'department_id' => $request->input('department_id'),
        ];

        if ($request->filled('itemcategory_id')) {
            $data['itemcategory_id'] = $request->input('itemcategory_id');
        } else {
            $data['itemcategory_id'] = null;
        }

        if ($request->filled('supplier_id')) {
            $data['supplier_id'] = $request->input('supplier_id');
        } else {
            $data['supplier_id'] = null;
        }

        $item = Item::findOrFail($item->id);
        $item->update($data);

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
