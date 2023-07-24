<?php

namespace App\Http\Controllers;

use App\Models\Itemcategory;
use App\Http\Requests\StoreItemcategoryRequest;
use App\Http\Requests\UpdateItemcategoryRequest;

class ItemcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemcategories = Itemcategory::paginate(10);
        return view('itemcategories.index', compact('itemcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itemcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemcategoryRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:itemcategories,name',
            'slug' => 'required|unique:itemcategories,slug',
        ]);

        Itemcategory::create($request->all());
        return redirect()->route('itemcategories.index',)->with('success','Item Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Itemcategory $itemcategory)
    {
        return view('itemcategories.show',compact('itemcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itemcategory $itemcategory)
    {
        return view('itemcategories.edit',compact('itemcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemcategoryRequest $request, Itemcategory $itemcategory)
    {
        $request->validate([
            'name' => 'required|unique:itemcategories,name,' . $itemcategory->id,
            'slug' => 'required|unique:itemcategories,slug,' . $itemcategory->id,
        ]);

        $itemcategory->update($request->all());
        return redirect('itemcategories.index')->with('success','Item Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itemcategory $itemcategory)
    {
        $itemcategory->delete();
        return redirect('itemcategories.index')->with('success','Item Category deleted successfully');
    }
}
