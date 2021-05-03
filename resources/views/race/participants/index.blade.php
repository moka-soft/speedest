<x-race-layout :navigation="$navigation" :race="$race">
    <div class="py-10 sm:px-6 lg:px-8">
        <x-jet-section-title>
            <x-slot name="title">{{ __('List/Attach/Detach Runners and Mark as a finished/unfinished Participation\'s') }}</x-slot>
            <x-slot name="description">{{ __('You can search runners and attach/detach/mark-finished/mark-unfinished it.') }}</x-slot>
        </x-jet-section-title>

        <div class="mt-5">
            @livewire('list-race-participants', ['race' => $race])
        </div>
    </div>
</x-race-layout>
