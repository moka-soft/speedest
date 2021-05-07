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
        <span>{{ $row->code }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1">
        <span>{{ $row->updated_at->diffForhumans() }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex justify-end">
        <button onclick='Livewire.emit("openModal", "delete-runner", @json(["runner" => $row]))' class="py-2 px-3 text-gray-600 bg-grey-light rounded-full cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
            <span class="flex items-center">
                <span class="h-4 w-4">
                    {{ svg('zondicon-trash') }}
                </span>
            </span>
        </button>
    </div>
</x-livewire-tables::table.cell>
