@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">User Details</h2>
            </div>
            <div class="bg-white rounded-md shadow-md p-6">
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
                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-blue-200 text-blue-800 rounded-full">{{ $role->name }}</span>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
