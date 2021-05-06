<x-modal form-action="submit">
    <x-slot name="title">
        {{ __('Create a new Race') }}
    </x-slot>

    <x-slot name="content">
        <x-jet-form-section submit="submit">
            <x-slot name="title">
                {{ __('Race properties') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Create a new race. Here you add the name and properties of race') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="date" value="{{ __('Date') }}" />
                    <x-jet-input id="date" type="date" class="mt-1 block w-full" wire:model.defer="date" />
                    <x-jet-input-error for="date" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12">
                    <x-jet-label for="type" value="{{ __('Type') }}" />
                    <select wire:model.defer="type" name="type" id="type" class="w-full rounded px-3 mt-1 py-2 outline-none">
                        <option value="null" class="py-1">Select a type</option>
                        @foreach($types as $type)
                            <option class="py-1" value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="type" class="mt-2" />
                </div>
            </x-slot>
        </x-jet-form-section>
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button wire:click="$emit('closeModal')" wire:loading.attr="disabled" class="mr-2 bg-red-900">
            {{ __('Close') }}
        </x-jet-button>

        <x-jet-button wire:click="submit" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-modal>
