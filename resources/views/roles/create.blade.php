<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Role') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="mb-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Name") }}</label>
              <input type="text" name="name" id="name" value="{{ old('name') }}" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
              <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Description") }}</label>
              <textarea name="description" id="description" class="border border-gray-300 rounded-md p-2 w-full" rows="4">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __("Create") }}</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>