@props(['actions', 'model', 'attached', 'finished'])
<div class="flex justify-around">
    <div class="flex-1">
        <span>{{ $model->name }}</span>
    </div>

    <div class="flex-1 text-left pr-10">
        <span>{{ $model->cpf }}</span>
    </div>

    <div class="flex-1 text-right lg:text-left">
        @if($attached)
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-500">
                Attached
            </span>
        @else
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-pink-50 text-pink-500">
                Detached
            </span>
        @endif
    </div>

    <div class="flex-1 text-right lg:text-left">
        @if($finished)
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-500">
                Finished
            </span>
        @else
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-red-50 text-red-500">
                Pending
            </span>
        @endif
    </div>

    <div class="justify-items-end">
        @if($attached && !$finished)
            <button wire:click="markRunnerFinished({{$model->id}})" class="p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap w-5 h-5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            </button>
        @elseif(!$attached)
            <button disabled style="cursor: not-allowed" class="p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap w-5 h-5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            </button>
        @endif
    </div>

    <x-lv-actions :actions="$actions" :model="$model" />
</div>
