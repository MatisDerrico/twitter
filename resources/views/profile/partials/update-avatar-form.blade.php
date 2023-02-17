<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Modifiez votre avatar') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar.update') }}"
        class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($user->avatar)
            <div class="flex justify-center">
                <div class="relative w-16 h-16">
                    <img src="{{ asset($user->avatar) }}"
                        class="w-full h-full rounded-full object-cover" />

                    <div class="absolute inset-0 rounded-full shadow-inner"
                        aria-hidden="true"></div>
                </div>
            </div>
        @endif

        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />


            <x-text-input id="avatar" class="block mt-1 w-full"
                type="file" name="avatar" />


            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'avatar-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
