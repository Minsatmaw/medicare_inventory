@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Department Details</h2>
            </div>
            <div class="bg-white rounded-md shadow-md p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Name:</h3>
                    <p>{{ $department->name }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Slug:</h3>
                    <p>{{ $department->slug }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('departments.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
