<x-modal>
    <x-slot name="title">
        {{ ___('Attach','/','Detach', 'Runner') }} - {{ $race->name }}
    </x-slot>

    <x-slot name="content">
        @livewire('list-runners-to-attach', ['race' => $race])
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button wire:click="$emit('closeModal')" wire:loading.attr="disabled" class="bg-red-900">
            {{ __('Close') }}
        </x-jet-button>
    </x-slot>
</x-modal>


