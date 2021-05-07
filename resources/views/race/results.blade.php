<x-race-layout :navigation="$navigation" :race="$race">
    <div class="py-10 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <x-jet-section-title>
                <x-slot name="title">{{ __('Race results') }}</x-slot>
                <x-slot name="description">{{ __('Here you can check all results related to this race.') }}</x-slot>
            </x-jet-section-title>
            <button type="button" class="inline-flex h-7 items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                <span class="flex items-center">
                    <span class="h-4 w-4">
                          {{ svg('heroicon-o-upload') }}
                    </span>
                </span>
            </button>
        </div>

        <div class="mt-5">
           // TODO
        </div>
    </div>
</x-race-layout>
