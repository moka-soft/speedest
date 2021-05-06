<x-livewire-tables::table.cell>
    <div class="flex-1">
        <span>{{ $row->id }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1">
        <span>{{ $row->name }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1 text-left pr-10">
        <span>{{ $row->date->format('Y/m/d') }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1 text-left pr-10">
        <span>{{ $row->updated_at->format('Y/m/d') }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if ($row->status == \App\Enums\StatusRaceEnum::coming())
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-500">
            Comming
        </span>
    @elseif ($row->status == \App\Enums\StatusRaceEnum::running())
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-500">
            Running
        </span>
    @elseif ($row->status == \App\Enums\StatusRaceEnum::completed())
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-500">
            Completed
        </span>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex justify-end">
        <a href="{{ route('race.show', $row->id) }}">
            <button class="py-3 px-3 text-gray-600 bg-grey-light rounded-full cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
            <span class="flex items-center">
                <span class="h-5 w-5">
                    {{ svg('zondicon-view-show') }}
                </span>
            </span>
            </button>
        </a>

        <button onclick='Livewire.emit("openModal", "delete-race", @json(["race" => $row ]))' class="py-2 px-3 text-gray-600 bg-grey-light rounded-full cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
            <span class="flex items-center">
                <span class="h-4 w-4">
                    {{ svg('zondicon-trash') }}
                </span>
            </span>
        </button>
    </div>
</x-livewire-tables::table.cell>

