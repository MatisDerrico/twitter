<div class="flex flex-col bg-white shadow-md rounded-md p-4 space-y-2 w-2/3 mx-auto">

    <div class="flex justify-between w-1/3 mx-auto">


        <div class="text-2xl font-bold text-center">
            <a href="{{route('tweet.show', $tweet->id)}}">{{ $tweet->title }}</a>
        </div>

        <div>
            <h2>{{ $tweet->user->name }}</h2>
            <h3>{{$tweet->created_at->format('d/m/Y')}}</h3>
        </div>

    </div>


        <p class="text-justify">
            {{ $tweet->message }}
        </p>

        <div class="flex justify-center">
            @if ($tweet->image)
                <img class="rounded-xl h-64" src="{{$tweet->image}}" alt="">
            @endif
        </div>

        <div class="flex">
            <a href="{{route('like.store', $tweet->id)}}"><x-heroicon-o-heart class="w-5 h-5 text-red-400" />Liker</a>
        </div>

</div>
