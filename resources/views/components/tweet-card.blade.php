<div class="flex flex-col bg-white shadow-md rounded-md p-4 space-y-2">
    <div class="text-xl font-bold">
        {{ $tweet->user->name }}
    </div>

    <div class="text-gray-700">
        {{ $tweet->text }}
    </div>

    <div class="flex">
        <x-heroicon-o-heart class="w-5 h-5 text-gray-500" />
    </div>
</div>
