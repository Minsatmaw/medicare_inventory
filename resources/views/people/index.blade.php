@extends('main.master')

@section('body')
    <div class="py-4">

        @if(session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-green-500 bg-green-300 border">
                {{ session('success') }}
            </div>
        @endif

        <div class="inline-block min-w-full overflow-hidden align-middle rounded-b-xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold ">Operator List</h2>

                <a href="{{ route('people.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Operator</a>

                {{-- @can('person-create')
                    <a href="{{ route('people.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Operator</a>
                @endcan --}}
            </div>
            @if ($people->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Slug</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($people as $person)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $person->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $person->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('people.show', $person->id) }}" class="text-blue-500 hover:underline">View</a>

                                    <a href="{{ route('people.edit', $person->id) }}" class="text-yellow-500 hover:underline">Edit</a>

                                    {{-- @can('person-edit')
                                        <a href="{{ route('people.edit', $person->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan --}}

                                    <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>

                                    {{-- @can('person-delete')
                                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    @endcan --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Operator found.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $people->links() }}
        </div>

    </div>
@endsection
