<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create User') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Name") }}</label>
              <input type="text" name="name" id="name" value="{{ old('name') }}" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
              <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Email") }}</label>
              <input type="text" name="email" id="email" value="{{ old('email') }}" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
              <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Password") }}</label>
              <input type="password" name="password" id="password" value="{{ old('password') }}" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
              <label for="role" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Role") }}</label>
              <select name="role_id" id="role" class="border border-gray-300 rounded-md p-2 w-full">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __("Create") }}</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>