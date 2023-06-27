<div x-data="{ dropdownOpen: false  }" class="absolute z-50 text-gray-500 right-5 lg:hidden top-5 focus:outline-none">
    <button @click="dropdownOpen = !dropdownOpen" class="z-10 block p-2 bg-white rounded-md focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
      </svg>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

    <div x-show="dropdownOpen" class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl">
      <a href="/" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-500 hover:text-white">
        Dashboard
      </a>
      <a href="{{route('users.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-500 hover:text-white">
        User List
      </a>
      <a href="{{route('roles.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-500 hover:text-white">
        Role List
      </a>
      <a href="{{route('permissions.index')}}" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-500 hover:text-white">
        Permissions List
      </a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-blue-500 hover:text-white">
        Sign Out
      </a>
    </div>
</div>
