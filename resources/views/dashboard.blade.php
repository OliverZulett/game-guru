<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 sm:gap-2 md:grid-cols-3 md:gap-3">
                <div onclick="window.location.href='{{ route('users') }}'" class="card cursor-pointer p-6 sm:rounded-lg drop-shadow-md text-white bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                    <div class="label mb-3">
                        <p class="text-2xl">users</p>
                    </div>
                    <div class="amount text-right">
                        <h1 class="text-9xl">{{ $metrics['totalUsers'] }}</h1>
                    </div>
                </div>
                <div onclick="window.location.href='{{ route('roles') }}'" class="card cursor-pointer p-6 sm:rounded-lg drop-shadow-md text-white bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                    <div class="label mb-3">
                        <p class="text-2xl">roles</p>
                    </div>
                    <div class="amount text-right">
                        <h1 class="text-9xl">{{ $metrics['totalRoles'] }}</h1>
                    </div>
                </div>
                <div onclick="window.location.href='{{ route('categories') }}'" class="card cursor-pointer p-6 sm:rounded-lg drop-shadow-md text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <div class="label mb-3">
                        <p class="text-2xl">categories</p>
                    </div>
                    <div class="amount text-right">
                        <h1 class="text-9xl">{{ $metrics['totalCategories'] }}</h1>
                    </div>
                </div>
                <div onclick="window.location.href='{{ route('tags') }}'" class="card cursor-pointer p-6 sm:rounded-lg drop-shadow-md text-white bg-gradient-to-r from-cyan-500 to-blue-500">
                    <div class="label mb-3">
                        <p class="text-2xl">tags</p>
                    </div>
                    <div class="amount text-right">
                        <h1 class="text-9xl">{{ $metrics['totalTags'] }}</h1>
                    </div>
                </div>
                <div onclick="window.location.href='{{ route('posts') }}'" class="card cursor-pointer p-6 sm:rounded-lg drop-shadow-md text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <div class="label mb-3">
                        <p class="text-2xl">all posts</p>
                    </div>
                    <div class="amount text-right">
                        <h1 class="text-9xl">{{ $metrics['totalPosts'] }}</h1>
                    </div>
                </div>
                <div onclick="window.location.href='{{ route('my-posts') }}'" class="card cursor-pointer p-6 sm:rounded-lg drop-shadow-md text-white bg-gradient-to-r from-cyan-500 to-blue-500">
                    <div class="label mb-3">
                        <p class="text-2xl">my posts</p>
                    </div>
                    <div class="amount text-right">
                        <h1 class="text-9xl">{{ $metrics['myTotalPosts'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>