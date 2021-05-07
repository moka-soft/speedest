<x-app-layout>
    <x-slot name="header">
        @livewire('race-header',  ['race' => $race])
    </x-slot>
    <hr>
    <div class="md:flex max-w-7xl mx-auto flex-col md:flex-row md:min-h-screen w-full bg-gray-100">
        <x-octo-sidebar :items="$navigation" />
        <div class="flex bg-white px-4 flex-col w-full">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>
