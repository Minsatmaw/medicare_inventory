<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function assignRole(Request $request)
    {
        $user = User::find(1);
        $role = Role::find(1);

        $user->roles()->attach($role);

        // Additional code...

        return response()->json(['message' => 'Role assigned to user successfully']);
    }

    public function assignPermission(Request $request)
    {
        $user = User::find(1); // Retrieve the user
        $permission = Permission::find(1); // Retrieve the permission

        $user->permissions()->attach($permission); // Assign the permission to the user
        // or
        // $user->permissions()->detach($permission); // Remove the permission from the user

        // Additional code...

        return response()->json(['message' => 'Permission assigned to user successfully']);
    }


    public function index()
    {
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();


        return view('users.create',compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::findOrFail($request->role);
        $user->roles()->attach($role);

        $permissions = $role->permissions()->pluck('id');
        $user->permissions()->attach($permissions);

        return redirect()->route('users.index')->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('roles');

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $user_permissions = [];
        foreach($user->permissions as $permission){
          $user_permissions[]=$permission->id;
        };

        return view('users.edit', compact('user', 'roles', 'permissions', 'user_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $role = Role::findOrFail($request->role);
        $user->roles()->sync([$role->id]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');

    }
}
