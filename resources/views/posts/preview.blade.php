<x-blog-layout>
  <img class="h-[600px] w-full object-cover" src="{{ $post->image }}" alt="" srcset="">
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h1 class="text-6xl mb-5" style="font-family: 'Bebas Neue', sans-serif;">
        {{$post->title}}
      </h1>

      <div class="flex flex-col mb-3">
        <h1 class="text-xl">Categories: </h1>
        <div class="flex">
          @foreach ($postCategories as $category)
          <div class="p-2 m-2 rounded-lg bg-[#EE6C4D]">{{ $category->name }} </div>
          @endforeach
        </div>
      </div>

      <div class="flex flex-col mb-3">
        <h1 class="text-xl">Tags: </h1>
        <div class="flex">
          @foreach ($postTags as $tag)
          <div class="p-2 m-2 rounded-lg bg-[#EE6C4D]">{{ $tag->name }} </div>
          @endforeach
        </div>
      </div>

      <div class="createdAt text-justify mb-10 text-xl">
        <p>{{$post->content}}</p>
      </div>

      <div class="creator flex justify-end items-center">
        <div class="mx-3">
          <div class="text-2xl text-[#E0FBFC]">{{$user->name}}</div>
          <div class="text-lg">{{date('d M Y', strtotime($post->created_at))}}</div>
        </div>
        <img class="border-2 p-2 border-[#EE6C4D] rounded-full w-24 h-24 object-cover" src="{{ $user->image }}" alt="Imagen">
      </div>
    </div>
  </div>
</x-blog-layout>