<x-race-layout :navigation="$navigation" :race="$race">
    <div class="py-10 sm:px-6 lg:px-8">

        <div class="flex justify-between">
            <x-jet-section-title>
                <x-slot name="title">{{ __('Race results') }}</x-slot>
                <x-slot name="description">{{ __('Here you can check all results related to this race.') }}</x-slot>
            </x-jet-section-title>
            <buttond disabled type="button" class="disabled:opacity-50 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase focus:outline-none">
                Import .xls
            </buttond>
        </div>
        <div class="mt-5">
           // TODO
        </div>
    </div>
</x-race-layout>
