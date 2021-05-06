<x-modal>
    <x-slot name="title">
        {{ __('Delete Race') }} - {{ $race->name }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this race? Once a race is deleted, all of its resources and data will be permanently deleted.') }}
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button wire:click="$emit('closeModal')" wire:loading.attr="disabled" class="mr-2 bg-red-900">
            {{ __('Cancel') }}
        </x-jet-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteRace" wire:loading.attr="disabled">
            {{ __('Delete Race') }}
        </x-jet-danger-button>
    </x-slot>
</x-modal>
