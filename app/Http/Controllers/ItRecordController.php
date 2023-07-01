<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Person;
use App\Models\ItRecord;
use Illuminate\Http\Request;

class ItRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itRecords = ItRecord::with(['person', 'item'])->get();

        return view('it_records.index', compact('itRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch necessary data for dropdowns
        $people = Person::all();
        $items = Item::all();


        return view('it_records.create', compact('people', 'items'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'person_id' => 'required',
            'item_id' => 'required',
            'stock' => 'required|numeric',
            'is_in' => 'required|boolean',
        ]);

        $itRecord = ItRecord::where('item_id', $request->item_id)->first();

        if ($itRecord) {
            if ($request->is_in) {
                $itRecord->stock += $request->stock;
            } else {
                $itRecord->stock -= $request->stock;

                if ($itRecord->stock < 0) {
                    return redirect()->back()->withErrors('Insufficient stock.');
                }
            }

            $itRecord->save();
        } else {
            ItRecord::create($request->all());
        }

        return redirect()->route('it_records.index')->with('success', 'IT Item Record created successfully.');
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
