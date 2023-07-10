<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::paginate(10);
        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:people,name',
            'slug' => 'required|unique:people,slug',
        ]);

        Person::create($request->all());
        return redirect()->route('people.index')->with('success','Operator Create Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $request->validate([
            'name' => 'required|unique:people,name,' . $person->id,
            'slug' => 'required|unique:people,slug'. $person->id,
        ]);

        $person->update($request->all());
        return redirect()->route('people.index')->with('success','Operator Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('people.index')->with('success','Operator Delete Success');
    }
}
