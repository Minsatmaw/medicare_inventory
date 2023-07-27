<div class="flex flex-row justify-center min-h-screen bg-gray-100">
    <div class="flex flex-col w-64 overflow-hidden bg-white ">
      {{-- Logo --}}
      <div class="flex items-center justify-center h-20 shadow-md">
        <img class="w-40 h-20 mx-auto" src="{{asset('img/Phase2LogoResized.gif')}}" alt="logo">
      </div>
      <ul class="flex flex-col py-4">
        {{-- Item Stock List --}}
        <li class="{{ Request::is('item_stocks*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
            <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('item_stocks.index')}}">
                <span class="mx-3">Item Stock List</span>
            </a>
        </li>

        {{-- Item Records --}}
        <li x-data="{ isOpenthree: localStorage.getItem('dropdownOpenthree') === 'true' || false }" x-init="localStorage.setItem('dropdownOpenthree', isOpenthree)">
          <!-- Dropdown Group -->
          <div>
              <button @click="isOpenthree = !isOpenthree; localStorage.setItem('dropdownOpenthree', isOpenthree)" class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800">
                  <span class="mx-3">Item Records</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>
              </button>

              <!-- Dropdown Items -->
              <ul x-show="isOpenthree" @click.away="isOpenthree = false; localStorage.setItem('dropdownOpenthree', false)" class="pl-4 pr-2 mt-2 space-y-1">
                  <li class="{{ Request::is('item_records*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                      <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('livewire.item-records')}}">
                          <span class="mx-3">Item Records</span>
                      </a>
                  </li>
              </ul>
          </div>
        </li>

        {{-- Item Management --}}
        <li x-data="{ isOpentwo: localStorage.getItem('dropdownOpentwo') === 'true' || false }" x-init="localStorage.setItem('dropdownOpentwo', isOpentwo)">
          <!-- Dropdown Group -->
          <div>
              <button @click="isOpentwo = !isOpentwo; localStorage.setItem('dropdownOpentwo', isOpentwo); " class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800">
                  <span class="mx-3">Item Management</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>
              </button>
                  <!-- Dropdown Items -->
              <ul x-show="isOpentwo" @click.away="isOpentwo = false; localStorage.setItem('dropdownOpentwo', false)" class="pl-4 pr-2 mt-2 space-y-1">
                  <li class="{{ Request::is('items*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                      <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('items.index')}}">
                          <span class="mx-3">Item</span>
                      </a>
                  </li>

                  <li class="{{ Request::is('itemcategories*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                      <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('itemcategories.index')}}">
                          <span class="mx-3">Item Category</span>
                      </a>
                  </li>

                  <li class="{{ Request::is('locations*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                      <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('locations.index')}}">
                          <span class="mx-3">Locations</span>
                      </a>
                  </li>

                  <li class="{{ Request::is('suppliers*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                      <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('suppliers.index')}}">
                          <span class="mx-3">Supplier</span>
                      </a>
                  </li>

              </ul>

          </div>
        </li>

        {{-- Operator --}}
        <li class="{{ Request::is('people*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
          <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('people.index')}}">
              <span class="mx-3">Operator</span>
          </a>
        </li>

        {{-- User Management --}}
        <li x-data="{ isOpenone: localStorage.getItem('dropdownOpenone') === 'true' || false }" x-init="localStorage.setItem('dropdownOpenone', isOpenone)">
            <!-- Dropdown Group -->
            <div>
                <button @click="isOpenone = !isOpenone; localStorage.setItem('dropdownOpenone', isOpenone)" class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800">
                    <span class="mx-3">User Management</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>
                </button>

                <!-- Dropdown Items -->
                <ul x-show="isOpenone" @click.away="isOpenone = false; localStorage.setItem('dropdownOpenone', false)" class="pl-4 pr-2 mt-2 space-y-1">
                    <li class="{{ Request::is('users*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                        <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('users.index')}}">
                            <span class="mx-3">User List</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('roles*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                        <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('roles.index')}}">
                            <span class="mx-3">Role List</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('permissions*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                        <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('permissions.index')}}">
                            <span class="mx-3">Permissions</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('departments*') ? '  bg-gray-100 rounded-r-2xl' : '' }}">
                        <a class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800" href="{{route('departments.index')}}">
                            <span class="mx-3">Departments</span>
                        </a>
                    </li>

                </ul>


            </div>
        </li>
      </ul>
    </div>
</div>


{{-- <li x-data="{ isOpen1: false, isOpen2: false, isOpen3: false }">
    <!-- Dropdown Group 1 -->
    <div>
        <button @click="isOpen1 = !isOpen1; if(isOpen1) { isOpen2 = false; isOpen3 = false; }" class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800">
            <span class="mx-3">Dropdown 1</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </button>

        <!-- Dropdown Items 1 -->
        <ul x-show="isOpen1" class="pl-4 pr-2 mt-2 space-y-1">
            <!-- Dropdown 1 items here -->
        </ul>
    </div>
</li>

<li x-data="{ isOpen2: false, isOpen1: false, isOpen3: false }">
    <!-- Dropdown Group 2 -->
    <div>
        <button @click="isOpen2 = !isOpen2; if(isOpen2) { isOpen1 = false; isOpen3 = false; }" class="flex items-center h-12 px-6 text-gray-500 transition-transform duration-200 ease-in transform hover:translate-x-2 hover:text-gray-800">
            <span class="mx-3">Dropdown 2</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </button>

        <!-- Dropdown Items 2 -->
        <ul x-show="isOpen2" class="pl-4 pr-2 mt-2 space-y-1">
            <!-- Dropdown 2 items here -->
        </ul>
    </div>
</li> --}}
