<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Post') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __("Update") }}</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>