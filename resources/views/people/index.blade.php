@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold ">Operator List</h2>
                @can('person-create')
                    <a href="{{ route('people.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Operator</a>
                @endcan
            </div>
            @if ($people->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Slug</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($people as $person)
                            <tr>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $person->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $person->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('people.show', $person->id) }}" class="text-blue-500 hover:underline">View</a>
                                    @can('person-create')
                                        <a href="{{ route('people.edit', $person->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('person-delete')
                                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Operator found.</p>
            @endif
        </div>
    </div>
@endsection
