<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $users = User::with('roles', 'departments')->paginate(10);

        return view('users.index', compact('users'));

    }



    protected function getLoggedInUserRole()
    {
        return Auth::user()->roles[0]->slug; // Assuming your user model has a 'role' property to represent the user's role


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

        // Get the logged-in user's role
        $loggedInUserRole = $this->getLoggedInUserRole();
        // Get all roles except "superadmin" if the logged-in user is not "superadmin"
        $roles = $loggedInUserRole === 'superadmin' ? Role::all() : Role::where('slug', '<>', 'superadmin')->get();

        $departments = Department::all();


        return view('users.create',compact('roles', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
            'department_id'=> 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department_id' => $request->department_id,
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
        // Get the logged-in user's role
        $loggedInUserRole = $this->getLoggedInUserRole();

        // Get all roles except "superadmin" if the logged-in user is not "superadmin"
        $roles = $loggedInUserRole === 'superadmin' ? Role::all() : Role::where('name', '<>', 'superadmin')->get();

        $permissions = Permission::all();
        $departments = Department::all();
        $user_permissions = [];
        foreach($user->permissions as $permission){
          $user_permissions[]=$permission->id;
        };

        return view('users.edit', compact('user', 'roles', 'departments', 'permissions', 'user_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {


        $validatedData = $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'permissions' => 'nullable|array',
            'department_id' => 'required',
        ]);

        $user->update([
           'name' => $validatedData['name'],
           'email' => $validatedData['email'],
           'role' => $validatedData['role'],
           'permissions' => $validatedData['permissions'],
           'department_id' => $request->input('department_id'),
        ]);

        $role = Role::findOrFail($request->role);
        $user->roles()->sync([$role->id]);


        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->input('permissions'))->get();
            $user->permissions()->sync($permissions); // Use sync instead of attach to replace existing permission associations
        }

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
