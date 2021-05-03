<x-race-layout :navigation="$navigation" :race="$race">
    <div class="py-10 sm:px-6 lg:px-8">
        <x-jet-section-title>
            <x-slot name="title">{{ __('List/Attach/Detach/Conclude Participation\'s') }}</x-slot>
            <x-slot name="description">{{ __('You can search runners and attach/detach/conclude it.') }}</x-slot>
        </x-jet-section-title>

        <div class="mt-5">
            @livewire('list-race-runners-participants')
        </div>
    </div>
</x-race-layout>
