@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle rounded-b-xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="px-4 py-2 text-2xl font-bold rounded-md">Item Record Table</h2>
                {{-- <h2 class="px-4 py-2 text-2xl font-bold rounded-md">{{ get_setting('app_title', 'Default Title') }}</h2> --}}

            </div>

            @if ($itemRecords->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Person</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Department</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Item</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Stock</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Status</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Description</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($itemRecords as $itemRecord)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemRecord->person->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemRecord->item->department->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemRecord->item->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemRecord->stock }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemRecord->status }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemRecord->description }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No itemRecords found.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $itemRecords->links() }}
        </div>

    </div>
@endsection
