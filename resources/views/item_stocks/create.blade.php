@extends('main.master')

@section('body')
<div class="py-4">
  @if(session('success'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-green-500 bg-green-300 border">
          {{ session('success') }}
      </div>
  @endif
  @if(session('error'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-red-500 bg-red-300 border">
          {{ session('error') }}
      </div>
  @endif

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Create Item Stock </h2>
        </div>
        <form action="{{ route('item_stocks.store') }}" method="POST" class="w-2/3">
            @csrf


            <div class="mb-4">
                <label for="department_id" class="block mb-1 font-semibold ">Department</label>
                <select name="department_id" id="department_id" class="w-full text-black border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" >
                    <option value="">Choose the Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>





            <div class="mb-4">
                <label for="item_id" class="block mb-1 font-semibold">Item Name</label>
                <div x-data="{isOpen: false, selectedItem: ''}" @click.away="isOpen = false">
                    <select @click="isOpen = !isOpen" x-model="selectedItem" name="item_id" id="item_id" class="w-full text-black border-gray-300 rounded-md shadow-sm cursor-pointer focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <!-- Default empty option -->
                    </select>
                </div>
            </div>






            {{-- <div class="mb-4">
                <label for="person_id" class="block mb-1 font-semibold">Person</label>
                <div x-data="{ isOpen: false, selectedPerson: '' }" @click.away="isOpen = false">
                    <select @click="isOpen = !isOpen" x-model="selectedPerson" name="person_id" id="person_id" class="w-full text-black border-gray-300 rounded-md shadow-sm cursor-pointer focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">Select a person ...</option>
                        @foreach($people as $person)
                            <option :value="{{ $person->id }}">{{ $person->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <input type="hidden" name="person_id" x-bind:value="selectedPerson"> --}}

            <div class="mb-4 ">
                <label for="person_id" class="block mb-1 font-semibold">Person</label>
                <div x-data="{ isOpen: false, selectedPerson: '' }" @click.away="isOpen = false">
                    <div @click="isOpen = !isOpen" class="w-full px-4 py-2 text-black bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <span x-text="selectedPerson ? selectedPerson.name : 'Select a person ...'"></span>
                    </div>
                    <ul x-show="isOpen" class="absolute z-10 w-2/5 overflow-y-auto bg-white border border-gray-300 rounded-md shadow-lg max-h-40">
                        @foreach($people as $person)
                            <li class="cursor-pointer" @click="isOpen = false; selectedPerson = { id: '{{ $person->id }}', name: '{{ $person->name }}' }">
                                <input type="radio" name="person_id" id="person_{{ $person->id }}" value="{{ $person->id }}" class="hidden">
                                <label for="person_{{ $person->id }}" class="block px-4 py-2 hover:bg-gray-100">{{ $person->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="person_id" :value="selectedPerson.id">
                </div>
            </div>



            {{-- <div class="mb-4">
                <label for="person_id" class="block mb-1 font-semibold">Person</label>
                <div x-data="{ isOpen: false, selectedPerson: '', searchQuery: '', people: @json($people) }" @click.away="isOpen = false">
                    <div @click="isOpen = !isOpen" class="relative w-full text-black border-gray-300 rounded-md shadow-sm cursor-pointer focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <span x-text="selectedPerson ? selectedPerson.name : 'Select a person'"></span>
                        <input
                            x-show="isOpen"
                            x-cloak
                            x-model="searchQuery"
                            @click.away="isOpen = false"
                            class="absolute w-full px-4 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="text"
                            placeholder="Search person..."
                        >
                    </div>
                    <ul x-show="isOpen" x-cloak class="absolute z-10 w-full py-2 mt-1 overflow-y-auto bg-white border border-gray-300 rounded-md shadow-lg max-h-40">
                        <template x-for="person in filteredPeople" :key="person.id">
                            <li class="cursor-pointer" @click="isOpen = false; selectedPerson = person">
                                <input type="radio" name="person_id" :id="'person_' + person.id" :value="person.id" class="hidden">
                                <label :for="'person_' + person.id" class="block px-4 py-2 hover:bg-gray-100" x-text="person.name"></label>
                            </li>
                        </template>
                    </ul>
                    <input type="hidden" name="person_id" :value="selectedPerson.id">
                </div>
            </div> --}}





            <div class="mb-4">
                <label for="stock" class="block mb-1 font-semibold ">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full text-black border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('stock') border-red-700 is-invalid  @enderror" value="{{old('stock')}}">
                @error('stock')
                    <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                @enderror
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
                <label for="description" class="block mb-1 font-semibold ">Description</label>
                <textarea cols="100" name="description" id="description" class="form-control @error('description') border-red-700 is-invalid  @enderror w-full border-gray-300 rounded-md shadow-sm  text-black  focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>

                @error('description')
                    <div class="text-red-600 invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection



@push('scripts')
<script>
    // When the department selection changes, fetch related items and update the item options
    document.getElementById('department_id').addEventListener('change', function () {
        var departmentId = this.value;
        var itemSelect = document.getElementById('item_id');

        // Clear existing item options
        itemSelect.innerHTML = '<option value=""></option>';

        // Fetch related items for the selected department using AJAX
        fetch(`/items/related-items/${departmentId}`)
            .then(response => response.json())
            .then(data => {
                // Populate the item options with the retrieved items
                data.forEach(item => {
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    itemSelect.appendChild(option);
                });
            });
    });
</script>
@endpush
