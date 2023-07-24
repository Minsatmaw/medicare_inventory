@extends('main.master')

@section('body')

    <div class=""></div>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">User Details</h2>
            </div>
            <div class="p-6 bg-white rounded-md shadow-md">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Name:</h3>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Email:</h3>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Roles:</h3>
                    @foreach($user->roles as $role)
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $role->name }}</span>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
