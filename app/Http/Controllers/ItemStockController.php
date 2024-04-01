<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Person;
use App\Models\ItemStock;
use App\Models\Department;
use App\Models\ItemRecord;
use Illuminate\Http\Request;
use App\Exports\ItemStockExport;
use Maatwebsite\Excel\Facades\Excel;

class ItemStockController extends Controller
{
  /**
   * Display a listing of the resource.
   */


  public function export()
  {
    return Excel::download(new ItemStockExport, 'item_stocks.xlsx');
  }

  public function index()
  {
    $itemStocks = ItemStock::with(['person', 'item', 'department'])->paginate(10);

    return view('item_stocks.index', compact('itemStocks'));
  }

  public function search(Request $request)
  {
    $search = $request->search;

    $itemStocks = ItemStock::whereHas('item', function ($query) use ($search) {
        $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('location', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
    })->with(['person', 'item', 'department'])->latest()->paginate(10);

    return view('item_stocks.index', compact('itemStocks'));
  }





  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $people = Person::all();
    $items = Item::all();
    $itemStocks = ItemStock::all();
    $departments = Department::all();


    return view('item_stocks.create', compact('people', 'items', 'itemStocks', 'departments'));
  }





  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'person_id' => 'required',
      'department_id' => 'required',
      'item_id' => 'required',
      'stock' => 'required|numeric',
      'is_in' => 'required|boolean',
      'description' => 'nullable',
    ]);

    $itemStock = ItemStock::where('item_id', $request->item_id)
        ->where('department_id', $request->department_id)
        ->first();

    if ($itemStock) {
      if ($request->is_in) {
        $itemStock->stock += $request->stock;
      } else {
        $itemStock->stock -= $request->stock;

        if ($itemStock->stock < 0) {
          return redirect()->back()->with('error', 'Insufficient stock.');
        }
      }
      $itemStock->save();
    } else {

      if ($request->is_in == 0) {
        return redirect()->back()->with('error', 'Insufficient stock.');
      }

      ItemStock::create($request->all());
    }

    ItemRecord::create([
      'person_id' => $request->person_id,
      'department_id' => $request->department_id,
      'item_id' => $request->item_id,
      'stock' => $request->stock,
      'status' => $request->is_in ? "IN" : "OUT",
      'description' => $request->description,
    ]);
    return redirect()->back()->with('success', 'IT Item Stock created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

}
