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
                <select name="department_id" id="department_id" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 tom-select-element" >
                    <option value="">Choose the Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>





            <div class="mb-4">
                <label for="item_id" class="block mb-1 font-semibold">Item Name</label>
                <select name="item_id" id="item_id" class="w-full text-black border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 item-option" disabled>


                </select>
            </div>


            {{-- Update code --}}
            {{-- <div class="mb-4">
                <label for="department_id" class="block mb-1 font-semibold">Department</label>
                <select
                    name="department_id"
                    id="department_id"
                    x-data="{ departmentId: '', items: [] }"
                    x-on:change="departmentId = $event.target.value; fetchItems()"
                    class="w-full text-black border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 department-option search-option"
                >
                    <option value="">Choose the Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="item_id" class="block mb-1 font-semibold">Item Name</label>
                <select
                    name="item_id"
                    id="item_id"
                    class="w-full text-black border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 item-option search-option"
                >
                    <option value="" class="text-sm text-gray-200">Choose Item</option>
                    <template x-for="item in items" :key="item.id">
                        <option :value="item.id" x-text="item.name"></option>
                    </template>
                </select>
            </div> --}}


            <div class="mb-4">
                <label for="person_id" class="block mb-1 font-semibold">Person</label>
                <select name="person_id" id="person_id" class="w-full text-black border-gray-300 rounded-md shadow-sm search-option focus:border-blue-500 focus:ring focus:ring-blue-200 tom-select-element">
                    <option  value="">Select Person</option>
                    @foreach($people as $person)
                        <option value="{{ $person->id }}">{{ $person->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label for="stock" class="block mb-1 font-semibold ">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full  text-black border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('stock') border-red-700 is-invalid  @enderror" value="{{old('stock')}}">
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


    //UPDATE code////////////////////////////////////////////////
     // Initialize TomSelect for the Department select element after updating its options
    //  new TomSelect("#department_id", {
    //                 create: false,
    //                 sortField: {
    //                     field: "text",
    //                     direction: "asc"
    //                 }
    //             });


    // function fetchItems() {
    //     var departmentId = document.getElementById('department_id').value;
    //     var itemSelect = document.getElementById('item_id');

    //     // Clear existing item options
    //     itemSelect.innerHTML = '<option value="">Choose Item</option>';

    //     // Fetch related items for the selected department using AJAX
    //     fetch(`/items/related-items/${departmentId}`)
    //         .then(response => response.json())
    //         .then(data => {
    //             // Populate the item options with the retrieved items
    //             data.forEach(item => {
    //                 var option = document.createElement('option');
    //                 option.value = item.id;
    //                 option.textContent = item.name;
    //                 itemSelect.appendChild(option);
    //             });



    //             // Initialize TomSelect for the Item select element after updating its options
    //             new TomSelect("#item_id", {
    //                 create: false,
    //                 sortField: {
    //                     field: "text",
    //                     direction: "asc"
    //                 }
    //             });
    //         });
    // }
    //UPDATE code////////////////////////////////////////////////



    //Before code //////////////////////////////////////////////////

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

                itemSelect.disabled = false;

                new TomSelect("#item_id",{
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                });
            });


        });

        // new TomSelect("#department_id",{
        //     create: false,
        //     sortField: {
        //         field: "text",
        //         direction: "asc"
        //     }
        // });

    //Before code //////////////////////////////////////////////////

        // new TomSelect("#person_id",{
        //     create: false,
        //     sortField: {
        //         field: "text",
        //         direction: "asc"
        //     }
        // });

        // Find all select elements with the "tom-select-element" class
        const tomSelectElements = document.querySelectorAll('.tom-select-element');

        // Initialize TomSelect for each found select element
        tomSelectElements.forEach(selectElement => {
            new TomSelect(selectElement, {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });





</script>
@endpush
