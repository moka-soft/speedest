<x-modal>
    <x-slot name="title">
        {{ ___('Delete', 'Runner') }} - {{ $runner->name }}
    </x-slot>

    <x-slot name="content">
        {{ ___('Are you sure you want to delete this', 'runner', '?', 'Once a', 'runner', 'is deleted', 'all of its resources and data will be permanently deleted.') }}
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button wire:click="$emit('closeModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteRunner" wire:loading.attr="disabled">
            {{ ___('Delete', 'Runner') }}
        </x-jet-danger-button>
    </x-slot>
</x-modal>
