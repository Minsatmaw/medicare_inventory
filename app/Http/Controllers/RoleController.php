<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */




    public function index()
    {
        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name',
            'slug' => 'required|unique:roles,slug',
            'description' => 'nullable',
            'permissions' => 'array',
        ]);

        // Role::create($validatedData);

        // return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        $role = Role::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'permissions' => $validatedData['permissions'],
        ]);

        if (isset($validatedData['permissions'])) {
            $role->permissions()->attach($validatedData['permissions']);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        return view('roles.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        // Check if the role is "superadmin" and prevent editing
        if ($role->slug === 'superadmin') {
            return redirect()->route('roles.index')
                ->with('error', 'Cannot edit the "superadmin" role.');
        }

        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'slug' => 'required|unique:roles,slug,' . $role->id,
            'description' => 'nullable',
            'permissions' => 'array',
        ]);

        // $role->update($validatedData);

        $role->update([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'permissions' => $validatedData['permissions'],
        ]);

        $role->permissions()->sync($validatedData['permissions'] ?? []);


        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        // Check if the role is "superadmin" and prevent deletion
        if($role->slug === 'superadmin'){
            return redirect()->route('roles.index')->with('error', 'Cannot Delete the "Super Admin" role.');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
