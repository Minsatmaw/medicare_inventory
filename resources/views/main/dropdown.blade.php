<div x-data="{ dropdownOpen: false  }" class="absolute z-50 text-gray-500 right-5 lg:hidden top-5 focus:outline-none">
    <button @click="dropdownOpen = !dropdownOpen" class="z-10 block p-2 bg-white rounded-md focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
      </svg>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

    <div x-show="dropdownOpen" class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl">

        @can('item-stock-list')
            <a href="{{route('item_stocks.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                Ttem Stock List
            </a>
        @endcan

        @can('usre-management')
            <div x-data="{ isOpen: false }">
                <!-- Dropdown Group -->
                <div>
                    <button @click="isOpen = !isOpen" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium">
                        <span>User Management</span>
                        <svg :class="{'rotate-180': isOpen}" class="w-4 h-4 transition-transform transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3.586L3.707 9.879a1 1 0 101.414 1.414L10 6.414l4.879 4.879a1 1 0 001.414-1.414L10 3.586z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Items -->
                    <ul x-show="isOpen" class="pl-4 pr-2 mt-2 space-y-1">
                        @can('user-list')
                            <li>
                                <a href="{{route('users.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                    User List
                                </a>
                            </li>
                        @endcan

                        @can('role-list')
                            <li>
                                <a href="{{route('roles.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                    Role List
                                </a>
                            </li>
                        @endcan

                        @can('permission-list')
                            <li>
                                <a href="{{route('permissions.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                    Permissions List
                                </a>
                            </li>
                        @endcan

                        @can('department-list')
                            <li>
                                <a href="{{route('departments.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                    Departments List
                                </a>
                            </li>
                        @endcan

                    </ul>
                </div>
            </div>
        @endcan

        @can('item-management')
            <div x-data="{ isOpen: false }">
                <!-- Dropdown Group -->
                <div>
                    <button @click="isOpen = !isOpen" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium">
                        <span>Item Management</span>
                        <svg :class="{'rotate-180': isOpen}" class="w-4 h-4 transition-transform transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3.586L3.707 9.879a1 1 0 101.414 1.414L10 6.414l4.879 4.879a1 1 0 001.414-1.414L10 3.586z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Items -->
                    <ul x-show="isOpen" class="pl-4 pr-2 mt-2 space-y-1">
                        <li>
                            <a href="{{route('items.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                Item List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('itemcategories.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                Item Category List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('locations.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                Locations List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('suppliers.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                                Suppliers List
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endcan


        @can('item-records')
            <a href="{{route('item_records.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                Item Records
            </a>
        @endcan


        @can('operators')
            <a href="{{route('people.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
                Operators List
            </a>
        @endcan


        <a href="#" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-400 hover:rounded-2xl hover:text-white">
            Sign Out
        </a>
    </div>
</div>
