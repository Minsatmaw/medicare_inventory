<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Http\Requests\StoreGeneralSettingRequest;
use App\Http\Requests\UpdateGeneralSettingRequest;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneralSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralSetting $generalSetting)
    {
        $generalsettings = GeneralSetting::first();
        return view('main', compact('generalsettings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneralSettingRequest $request, GeneralSetting $generalSetting)
    {
        $generalsettings = GeneralSetting::first();
        $generalsettings->update($request->all());

        return redirect()->route('generalsettings.edit')->with('success', 'Change Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
