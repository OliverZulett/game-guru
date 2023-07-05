<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Post') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if ($errors->any())
      <div class="flex text-red-600 border-2 border-red-600 p-3 rounded-lg bg-red-100 mb-5">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;">
          <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
          <line x1="12" y1="8" x2="12" y2="12"></line>
          <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        <div class="ml-2">
          <strong>Error:</strong>
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <header>
            <h2 class="text-lg font-medium text-gray-900">
              {{ __('Post data') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
              {{ __("Update your amazing post about some videogame.") }}
            </p>
          </header>

          <form class="mt-5" action="{{ route('my-posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
              <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Title *") }}</label>
              <input type="text" name="title" id="title" value="{{ $post->title }}" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
              <label for="image_url" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Portail Image *") }}</label>
              <input type="text" name="image_url" id="image_url" value="{{ $image->url ?? '' }}" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
              <label for="abstract" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Abstract *") }}</label>

              <p class="mt-1 text-sm text-gray-600">
                {{ __("A short resume about your post.") }}
              </p>
              <textarea name="abstract" id="abstract" class="border border-gray-300 rounded-md p-2 w-full" rows="3">{{ $post->abstract }}</textarea>
            </div>

            <div class="mb-4">
              <label for="content" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Content *") }}</label>
              <textarea name="content" id="content" class="border border-gray-300 rounded-md p-2 w-full" rows="5">{{ $post->content }}</textarea>
            </div>

            <div class="mb-4">
              <label for="content" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Categories") }}</label>
              <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 sm:gap-2 md:grid-cols-5 md:gap-5">
                @foreach ($categories as $category)
                <div class="">
                  <input type="checkbox" name="categories[]" value="{{ $category['id'] }}" id="category{{ $category['id'] }}" @if ($postCategories->contains('id', $category['id'])) checked @endif>
                  <label for="category{{ $category['id'] }}">{{ $category['name'] }}</label>
                </div>
                @endforeach
              </div>
            </div>

            <div class="mb-4">
              <label for="content" class="block text-gray-700 text-sm font-bold mb-2">{{ __("Tags") }}</label>
              <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 sm:gap-2 md:grid-cols-5 md:gap-5">
                @foreach ($tags as $tag)
                <div class="">
                  <input type="checkbox" name="tags[]" value="{{ $tag['id'] }}" id="tag{{ $tag['id'] }}" @if ($postTags->contains('id', $tag['id'])) checked @endif>
                  <label for="tag{{ $tag['id'] }}">{{ $tag['name'] }}</label>
                </div>
                @endforeach
              </div>
            </div>

            <div class="flex mt-10">
              <x-primary-button type="submit" class="mr-3">
                {{ __('update') }}
              </x-primary-button>
              <x-danger-button onclick="window.location.href='{{ route('my-posts') }}'" class="mr-3">
                {{ __('cancel') }}
              </x-danger-button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>