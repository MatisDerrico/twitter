<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('tweet') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl p-6 mx-auto sm:px-6 lg:px-8 space-y-6 bg-white">

            <div class="flex justify-between w-1/3 mx-auto">

                <h1 class="text-2xl font-bold text-center">{{$tweet->title}}</h1>

                <div>
                    <h2>{{$user->name}}</h2>
                    <h3>{{$tweet->created_at->format('d/m/Y')}}</h3>
                </div>

            </div>

            <p class="text-justify">{{$tweet->message}}</p>

            <div class="flex justify-center">
                <img class="rounded-xl h-64" src="{{$tweet->image}}" alt="">
            </div>

            <div class="flex">
                <a href="{{route('like.store', $tweet->id)}}"><x-heroicon-o-heart class="w-5 h-5 text-red-400" />Liker</a>
            </div>

        </div>
    </div>
</x-app-layout>
