<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('My Posts') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <div class="w-full flex justify-between items-center mb-5">
            <h1>My registered posts</h1>
            <x-primary-button onclick="window.location.href='{{ route('my-posts.create') }}'">{{ __('+ Add') }}</x-primary-button>
          </div>
          @if ($posts->count() > 0)
          <table class="min-w-full divide-y divide-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-100">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Abstract
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created At
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                <tr>
                  <td class="px-6 py-4">
                    {{ $post->title }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $post->abstract }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $post->created_at }}
                  </td>
                  <td class="px-6 py-4 w-40">
                    <button class="text-gray-500 hover:text-blue-700 mr-2" title="Preview" onclick="window.location.href='{{ route('posts.preview', $post->id) }}'">
                      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>
                    </button>
                    <button class="text-blue-500 hover:text-blue-700 mr-2" title="Edit" onclick="window.location.href='{{ route('my-posts.edit', $post->id) }}'">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                      </svg>
                    </button>
                    <button class="text-red-500 hover:text-blue-700 mr-2" title="Delete" onclick="window.location.href='{{ route('my-posts.destroy', $post->id) }}'">
                      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3">
              {{ $posts->links() }}
            </div>
          </table>
          @else
          <p>No Post avalaible yet, why dont you create a new one?</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>