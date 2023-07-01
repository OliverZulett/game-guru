<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit User') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{$user}}
          <div class="flex justify-center">
            <img src="{{ $user->url ? $user->url : 'https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2531&q=80' }}" alt="Imagen" class="rounded-full w-52 h-52 object-cover">
          </div>
          <div class="flex justify-center mt-3">
            <h1 class="text-2xl text-gray-900">
                {{ $user->name}}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>