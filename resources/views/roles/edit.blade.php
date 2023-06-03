@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Edit Role</h2>
            </div>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ $role->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="slug" class="block mb-1 font-semibold text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ $role->slug }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-1 font-semibold text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ $role->description }}</textarea>
                </div>
                <div class="mt-4 mb-4">
                    <label class="block font-medium">Permissions</label>
                        @foreach ($permissions as $permission)
                            <div class="flex items-center mt-2">
                                <input id="permission-{{ $permission->id }}" name="permissions[]" type="checkbox" value="{{ $permission->id }}" class="form-checkbox" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                <label for="permission-{{ $permission->id }}" class="ml-2">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Update</button>
                    <a href="{{ route('roles.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
