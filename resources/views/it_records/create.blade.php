@extends('main.master')

@section('body')
<div class="py-4">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Create IT Item Record </h2>
        </div>
        <form action="{{ route('it_records.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="person_id" class="block mb-1 font-semibold text-gray-700">Person</label>
                <select name="person_id" id="person_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @foreach($people as $person)
                        <option value="{{ $person->id }}">{{ $person->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="item_id" class="block mb-1 font-semibold text-gray-700">Item Name</label>
                <select name="item_id" id="item_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Add similar code for other dropdowns: item_id, item_category_id, location_id, supplier_id -->

            <div class="mb-4">
                <label for="stock" class="block mb-1 font-semibold text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Status</label>
                <label class="inline-flex items-center">
                    <input type="radio" name="is_in" value="1" class="form-radio">
                    <span class="ml-2">In</span>
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="is_in" value="0" class="form-radio">
                    <span class="ml-2">Out</span>
                </label>
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
