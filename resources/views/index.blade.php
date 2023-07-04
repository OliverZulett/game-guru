<x-blog-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 sm:gap-2 md:grid-cols-3 md:gap-3">
        <div onclick="window.location.href='{{ route('users') }}'" class="card cursor-pointer p-6 sm:rounded-lg bg-[#EE6C4D] hover:bg-[#293241] text-[#E0FBFC] hover:border-4 hover:border-[#EE6C4D] ease-in-out duration-200">
          <div class="title mb-3">
            <h1 style="font-family: 'Bebas Neue', sans-serif;" class="text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti provident ad, iure totam vel ratione?</h1>
          </div>
          <div class="abstract text-justify mb-3">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consectetur rem eveniet veritatis minima, commodi alias qui totam.</p>
          </div>
          <div class="createdAt italic  mb-3">
            <p>12 13 2023</p>
          </div>
          <div class="creator flex justify-end items-center uppercase font-bold text-[#EE6C4D]">
            <p class="mr-2">by: user</p>
            <img class="rounded-full w-10 h-10 object-cover" src="{{'https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2531&q=80' }}" alt="Imagen">
          </div>
        </div>
      </div>
    </div>
  </div>
</x-blog-layout>