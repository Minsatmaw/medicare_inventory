@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Edit Item Category</h2>
            </div>
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="code" class="block mb-1 font-semibold text-gray-700">Item Code</label>
                    <input type="text" name="code" id="code" value="{{$item->code}}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('code') border-red-700 is-invalid  @enderror" required>
                    @error('code')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Item Name</label>
                    <input type="text" name="name" id="name" value="{{$item->name}}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-700 is-invalid  @enderror" required>
                    @error('name')
                        <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="department_id" class="block mb-1 font-semibold text-gray-700">Department</label>
                    <select name="department_id" id="department_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $department->id == $item->department_id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="item_category_id" class="block mb-1 font-semibold text-gray-700">Category</label>
                    <select name="itemcategory_id" id="itemcategory_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">Choose a Item Category</option>
                        @foreach($itemcategories as $itemcategory)
                            <option value="{{ $itemcategory->id }}" {{$itemcategory->id == $item->itemcategory_id ? 'selected' : '' }}>
                                {{ $itemcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="location_id" class="block mb-1 font-semibold text-gray-700">Location</label>
                    <select name="location_id" id="location_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ $location->id == $item->location_id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="supplier_id" class="block mb-1 font-semibold text-gray-700">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">Choose a Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $supplier->id == $item->supplier_id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Update</button>
                    <a href="{{ route('items.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
