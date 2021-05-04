<x-modal form-action="submit">
    <x-slot name="title">
        {{ __('Create a new Runner') }}
    </x-slot>

    <x-slot name="content">
        <x-jet-form-section submit="submit">
            <x-slot name="title">
                {{ __('Basic Information\'s') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Create a new runner. Here you add the basic information\'s of runner') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="code" value="{{ __('Code') }}" />
                    <x-jet-input maxlength="11" id="code" type="text" class="mt-1 block w-full" wire:model.defer="code" />
                    <x-jet-input-error for="code" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="birth_date" value="{{ __('Birth Date') }}" />
                    <x-jet-input id="birth_date" type="date" class="mt-1 block w-full" wire:model.defer="birth_date" />
                    <x-jet-input-error for="birth_date" class="mt-2" />
                </div>
            </x-slot>
        </x-jet-form-section>
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button wire:click="$emit('closeModal')" class="mr-2 bg-red-900">
            {{ __('Close') }}
        </x-jet-button>

        <x-jet-button wire:click="submit">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-modal>
