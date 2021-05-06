<x-race-layout :navigation="$navigation" :race="$race">
    <div class="py-10 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <x-jet-section-title>
                <x-slot name="title">{{ __('List Runners') }}</x-slot>
                <x-slot name="description">{{ __('You can list and edit the runner state.') }}</x-slot>
            </x-jet-section-title>
        </div>

        <div class="mt-5">
            @livewire('list-race-runners', ['race' => $race])
        </div>
    </div>
</x-race-layout>
