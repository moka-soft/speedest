<x-livewire-tables::table.cell>
    <div class="flex-1 lg:inline">
        <span>{{ $row->name }}</span>
        <span class="flex text-xs text-gray-400">
            {{ $row->code }}
        </span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex justify-end">
        @if($row->races->filter(fn($r) => $r->id === $race['id'])->count() === 0)
            <button wire:click="attachRunner({{ $row->id }})" class="py-2 px-3 text-gray-600 bg-grey-light rounded-full cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                <span class="flex items-center">
                    <span class="h-4 w-4">
                        {{ svg('zondicon-add-outline') }}
                    </span>
                </span>
            </button>
        @else
            <button wire:click="detachRunner({{ $row->id }})" class="py-2 px-3 text-gray-600 bg-grey-light rounded-full">
                <span class="flex items-center">
                    <span class="h-4 w-4">
                        {{ svg('zondicon-minus-solid') }}
                    </span>
                </span>
            </button>
        @endif
    </div>
</x-livewire-tables::table.cell>
