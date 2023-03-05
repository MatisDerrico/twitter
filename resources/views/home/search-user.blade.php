


<x-app-layout>

    <div class="flex w-50 mb-4 mx-auto">

             <form method="post" action="{{ route('tweet.search') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                 @csrf

                 <div class="flex gap-4">
                     <x-text-input id="search" name="search" type="text" class="mt-1 block w-full"  required autofocus autocomplete="search" placeholder="Rechercher un tweet ou une personne" />
                     <x-input-error class="mt-2" :messages="$errors->get('search')" />

                 </div>

                 <div class="flex items-center gap-4">
                     <x-primary-button>{{ __('rechercher') }}</x-primary-button>
                 </div>

             </form>

    </div>

     <div>
         <ul class="flex flex-col space-y-4">
             @foreach ($tweets as $tweet)
                 <li class="flex flex-col ">
                     <x-tweet-card :tweet="$tweet" />
                 </li>
             @endforeach
         </ul>

         <div class="mt-4">
             {{ $tweets->links() }}
         </div>
     </div>


     @if ($user ->count())

     <div>
         <ul class="flex flex-col space-y-4">
             @foreach ($user as $us)
                 <li class="flex flex-col ">
                     <x-user-card :user="$us" />
                 </li>
             @endforeach
         </ul>

         <div class="mt-4">
             {{ $user->links() }}
         </div>
     </div>
     @endif

 </x-app-layout>
