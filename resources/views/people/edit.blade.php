@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Edit Operator</h2>
            </div>
            <form action="{{ route('people.update', $person->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-700 is-invalid  @enderror" value="{{ $person->name }}" required>
                    @error('name')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="slug" class="block mb-1 font-semibold text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-700 is-invalid  @enderror" value="{{ $person->slug }}" required>
                    @error('name')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Update</button>
                    <a href="{{ route('people.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
