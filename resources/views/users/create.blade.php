@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Create User</h2>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-700 is-invalid  @enderror" value="{{old('name')}}" required>
                    @error('name')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('email') border-red-700 is-invalid  @enderror" value="{{old('email')}}" required>
                    @error('email')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-1 font-semibold text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('password') border-red-700 is-invalid  @enderror" value="{{old('password')}}" required>
                    @error('password')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-1 font-semibold text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('password_confirmation') border-red-700 is-invalid  @enderror" value="{{old('password_confirmation')}}" required>
                    @error('password_confirmation')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="department_id" class="block mb-1 font-semibold text-gray-700">Department</label>
                    <select name="department_id" id="department_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 tom-select-element">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="block mb-1 font-semibold text-gray-700">Role</label>
                    <select name="role" id="role" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 tom-select-element">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create</button>
                    <a href="{{ route('users.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script>

        // Find all select elements with the "tom-select-element" class
        const tomSelectElements = document.querySelectorAll('.tom-select-element');

        // Initialize TomSelect for each found select element
        tomSelectElements.forEach(selectElement => {
            new TomSelect(selectElement, {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });


    </script>
@endpush





