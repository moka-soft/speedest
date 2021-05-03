<x-modal form-action="submit">
    <x-slot name="title">
        {{ __('Mark participation as a finished') }}
    </x-slot>

    <x-slot name="content">
        <x-jet-form-section submit="submit">
            <x-slot name="title">
                {{ __('Mark participation as a finished') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Add the start & end of participation') }}
            </x-slot>

            <x-slot name="form">
                <x-jet-input value="{{ $runner_id }}" id="start" type="hidden" class="mt-1 block w-full" wire:model.defer="runner_id" />
                <x-jet-input value="{{ $race_id }}" id="start" type="hidden" class="mt-1 block w-full" wire:model.defer="race_id" />
                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="start" value="{{ __('Start') }}" />
                    <x-jet-input id="start" type="time" class="mt-1 block w-full" wire:model.defer="start" />
                    <x-jet-input-error for="start" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="end" value="{{ __('End') }}" />
                    <x-jet-input id="end" type="time" class="mt-1 block w-full" wire:model.defer="end" />
                    <x-jet-input-error for="end" class="mt-2" />
                </div>
            </x-slot>
        </x-jet-form-section>
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button wire:click="$emit('closeModal')" class="mr-2 bg-red-900">
            {{ __('Close') }}
        </x-jet-button>

        <x-jet-button wire:click="submit">
            {{ __('Mark as a finished') }}
        </x-jet-button>
    </x-slot>
</x-modal>
