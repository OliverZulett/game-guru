<x-blog-layout>
  <img class="h-[600px] w-full object-cover" src="https://images.unsplash.com/photo-1577741314755-048d8525d31e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="" srcset="">
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h1 style="font-family: 'Bebas Neue', sans-serif;" class="text-5xl">
        {{$post->title}}
      </h1>

      <div class="createdAt mb-3">
        <p>{{$post->created_at}}</p>
      </div>

      <div class="createdAt text-justify mb-3">
        <p>{{$post->content}}</p>
      </div>

      <div class="creator flex justify-start items-center font-bold text-[#EE6C4D]">
        <img class="rounded-full w-32 h-32 object-cover" src="{{'https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2531&q=80' }}" alt="Imagen">
        <p class="ml-2">by: {{$post->user_name}}</p>
      </div>
    </div>
  </div>
</x-blog-layout>