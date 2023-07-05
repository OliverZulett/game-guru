<x-blog-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 sm:gap-2 md:grid-cols-3 md:gap-3">

        @foreach ($posts as $post)
        <div onclick="window.location.href='{{ route('posts.preview', $post->id) }}'" class="card flex flex-col justify-between cursor-pointer p-6 sm:rounded-lg bg-[#EE6C4D] hover:bg-[#293241] text-[#E0FBFC] hover:border-4 hover:border-[#EE6C4D] ease-in-out duration-300">
          <div>
            <div class="title mb-5">
              <h1 style="font-family: 'Bebas Neue', sans-serif;" class="text-3xl">
                {{$post->title}}
              </h1>
            </div>
            <div class="abstract text-justify mb-3">
              <p class="leading-5 text-base">
                {{$post->abstract}}
              </p>
            </div>
            <div class="createdAt  mb-3">
              <p>{{date('d M Y', strtotime($post->created_at))}}</p>
            </div>
          </div>
          <div class="creator flex justify-end items-center font-bold text-[#EE6C4D]">
            <p class="mr-2">by: {{$post->user_name}}</p>

            @if ($post->user_image)
            <img class="rounded-full w-10 h-10 object-cover" src="{{ $post->user_image }}" alt="Imagen">

            @endif
          </div>
        </div>
        @endforeach

      </div>
      <div class="navigation mt-5 text-white">
        {{ $posts->links() }}
      </div>
    </div>

  </div>
</x-blog-layout>