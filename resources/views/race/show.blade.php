<x-race-layout :navigation="$navigation" :race="$race">
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="updateProfileInformation">
                <x-slot name="title">
                    {{ __('Race Information\'s') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Update races information\'s here.') }}
                </x-slot>

                <x-slot name="form">
                    <!-- Name -->
                    <div class="col-span-12 sm:col-span-12">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input disabled id="name" type="text" class="mt-1 block w-full" :value="$race->name" autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Date -->
                    <div class="col-span-12 sm:col-span-12">
                        <x-jet-label for="date" value="{{ __('Date') }}" />
                        <x-jet-input disabled id="date" type="date" class="mt-1 block w-full" :value="$race->date->format('Y-m-d')" />
                        <x-jet-input-error for="date" class="mt-2" />
                    </div>

                    <!-- Type -->
                    <div class="col-span-12 sm:col-span-12">
                        <x-jet-label for="type" value="{{ __('Type') }}" />
                        <select disabled name="type" id="type" class="w-full rounded px-3 mt-1 py-2 outline-none">
                            <option class="py-1">{{ $race->type->name }}</option>
                        </select>
                        <x-jet-input-error for="type" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-button disabled>
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>
            <x-jet-section-border />
        </div>
    </div>
</x-race-layout>
