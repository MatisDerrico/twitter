<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Créez votre tweet') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('tweet.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Titre du tweet')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"  required autofocus autocomplete="title" placeholder="Mettre un titre" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="message" :value="__('Message')" />
            <textarea id="message" name="message" class="mt-1 block w-full" required autocomplete="message" placeholder="Mettre un message"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('message')" />

        </div>

        <div>
            <x-input-label for="image" :value="__('Image du tweet')" />


            <x-text-input id="image" class="block mt-1 w-full"
                type="file" name="image" />


            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Publier') }}</x-primary-button>

            @if (session('status') === 'tweet')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
