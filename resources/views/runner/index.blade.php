<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Runners') }}
            </h2>

            <button onclick="Livewire.emit('openModal', 'create-runner')" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Create
            </button>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-12 px-4 my-3 sm:px-6 lg:px-8">
        @livewire('runners-table-view')
    </div>
</x-app-layout>
