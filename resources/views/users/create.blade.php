@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Create User</h2>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-1 font-semibold text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-1 font-semibold text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="role" class="block mb-1 font-semibold text-gray-700">Role</label>
                    <select name="role" id="role" onchange="checkPermissions(this)">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold text-gray-700">Permissions</label>
                    @foreach($permissions as $permission)
                        <div>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create</button>
                    <a href="{{ route('users.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function checkPermissions(select) {
            const roleId = select.value;
            const checkboxes = document.querySelectorAll('input[name="permissions[]"]');

            // Clear the checked state of all permissions
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            if (roleId) {
                const rolePermissions = @json($roles->pluck('permissions', 'id'));

                // Get the permissions associated with the selected role
                const selectedRolePermissions = rolePermissions[roleId];

                // Auto-check the permissions associated with the selected role
                selectedRolePermissions.forEach(permissionId => {
                    const checkbox = document.querySelector(`input[value="${permissionId}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });
            }
        }
    </script>
@endsection





