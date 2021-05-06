<x-livewire-tables::table.cell>
    <div class="flex-1 lg:inline">
        <span>{{ $row->runner->name }}</span>
        <span class="flex text-xs text-gray-400">
            {{ $row->runner->code }}
        </span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1">
        <span>{{ $row->id }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if ($row->start_at && !$row->end_at)
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-500">
            Running
        </span>
    @elseif ($row->end_at)
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-500">
            Completed
        </span>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex justify-end">

        @if (!$row->end_at)
            <button onclick='Livewire.emit("openModal", "show-race-runner", @json(["race_runner" => $row]))' class="py-3 px-3 text-gray-600 bg-grey-light rounded-full cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                <span class="flex items-center">
                    <span class="h-4 w-4">
                        {{ svg('heroicon-o-clock') }}
                    </span>
                </span>
            </button>
        @elseif ($row->end_at)
            <button onclick='Livewire.emit("openModal", "show-race-runner", @json(["race_runner" => $row]))' class="py-3 px-3 text-gray-600 bg-grey-light rounded-full cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                <span class="flex items-center">
                    <span class="h-4 w-4">
                        {{ svg('heroicon-s-clock') }}
                    </span>
                </span>
            </button>
        @endif
    </div>
</x-livewire-tables::table.cell>
