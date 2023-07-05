<nav x-data="{ open: false }" class="border-b border-[#EE6C4D]">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div onclick="window.location.href='{{ route('posts') }}'" class="cursor-pointer text-[#EE6C4D] shrink-0 flex items-center">
          <h1 class="text-5xl font-['Bebas Neue', 'sans-serif']" style="font-family: 'Bebas Neue', sans-serif;
">Game guru</h1>
        </div>
      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-[#EE6C4D] text-sm leading-4 font-medium rounded-md text-[#EE6C4D] hover:text-[#E0FBFC] focus:outline-none transition ease-in-out duration-150">
              <div>
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>

              <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>

          <x-slot name="content">

            @if (Auth::user())
            <x-dropdown-link :href="route('dashboard')" class="text-[#EE6C4D]">
              {{ __('Dashboard') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-[#EE6C4D]">
              {{ __('Log Out') }}
            </x-dropdown-link>
            @else
            <x-dropdown-link :href="route('login')" class="text-[#EE6C4D]">
              {{ __('Sing In') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('register')" class="text-[#EE6C4D]">
              {{ __('Sing Up') }}
            </x-dropdown-link>

            @endif
          </x-slot>
        </x-dropdown>
      </div>

      <!-- Hamburger -->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#EE6C4D] hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
      <div class="my-3 space-y-1 text-[#EE6C4D]">
        <x-responsive-nav-link :href="route('profile.edit')" class="text-[#EE6C4D]">
          {{ __('Sing In') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('profile.edit')" class="text-[#EE6C4D]">
          {{ __('Sing Up') }}
        </x-responsive-nav-link>
      </div>
    </div>
  </div>
</nav>