@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Edit User</h2>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-700 is-invalid  @enderror" value="{{ $user->name }}" required>
                    @error('name')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-700 is-invalid  @enderror" value="{{ $user->email }}" required>
                    @error('name')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="role" class="block mb-1 font-semibold text-gray-700">Role</label>
                    <select name="role" id="role" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block font-medium">Permissions</label>
                        @foreach ($permissions as $permission)
                            <div class="flex items-center mt-2">
                                <input id="permission-{{ $permission->id }}" name="permissions[]" type="checkbox" value="{{ $permission->id }}" class="form-checkbox"
                                @if (in_array($permission->id, $user_permissions))
                                  checked
                                @endif
                                >
                                <label for="permission-{{ $permission->id }}" class="ml-2">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Update</button>
                    <a href="{{ route('users.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
