<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity opacity-50 bg-violet-800 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-violet-500 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <svg class="w-12 h-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"/>
            </svg>

            <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
        </div>
    </div>


    <div class="">
        <nav class="mt-10">
            <ul>
                <li class="{{ Request::is('dashboard*') ? ' bg-indigo-700' : '' }}">
                    <a class="flex items-center px-6 py-2 mt-2 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/dashboard">
                        <span class="mx-3">Dashboard</span>
                    </a>
                </li>
                @can('user-list')
                    <li class="{{ Request::is('users*') ? ' bg-indigo-700' : '' }}">
                        <a class="flex items-center px-6 py-2 mt-2 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('users.index') }}">
                            <span class="mx-3">User List</span>
                        </a>
                    </li>
                @endcan
                @can('role-list')
                    <li class="{{ Request::is('roles*') ? ' bg-indigo-700' : '' }}">
                        <a class="flex items-center px-6 py-2 mt-2 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('roles.index') }}">
                            <span class="mx-3">Roles List</span>
                        </a>
                    </li>
                @endcan
                @can('permission-list')
                    <li class="{{ Request::is('permissions*') ? ' bg-indigo-700' : '' }}">
                        <a class="flex items-center px-6 py-2 mt-2 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('permissions.index') }}">
                            <span class="mx-3">Permissions List</span>
                        </a>
                    </li>
                @endcan


                    <li class="relative" x-data="{ isOpen: false }">
                        <button class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" @click="isOpen = !isOpen">
                            <span class="mx-3">User List</span>
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path x-show="!isOpen" fill-rule="evenodd" d="M7.293 8.707a1 1 0 010-1.414l4-4a1 1 0 111.414 1.414L9 9.414l3.707 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                <path x-show="isOpen" fill-rule="evenodd"  d="M6 8.293a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul class="absolute left-0 mt-1 space-y-2 bg-white border border-gray-200 rounded shadow-lg" x-show="isOpen">
                            <li>
                                <a class="block px-6 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('users.create') }}">Create User</a>
                            </li>
                            <li>
                                <a class="block px-6 py-2 text-gray-800 hover:bg-gray-100" href="/">Edit User</a>
                            </li>
                            <!-- Add more dropdown items as needed -->
                        </ul>
                    </li>

            </ul>
        </nav>
    </div>

    {{-- <nav class="mt-10">
        @can('user-list')
            <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300" href="{{route('users.index')}}">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="mx-3">User List</span>
            </a>

            <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('users*') ? ' bg-indigo-700 text-white border' : '' }}" href="{{route('users.index')}}">
                <span class="mx-3">Dashboard</span>
            </a>
        @endcan
    </nav> --}}
</div>