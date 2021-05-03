@props(['actions', 'model'])
<div class="flex justify-around">
    <div class="flex-1">
        <span>{{ $model->name }}</span>
    </div>

    <div class="flex-1 text-right lg:text-left">
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-500">
            Attached
        </span>
    </div>

    <div class="flex-1 text-right lg:text-left">
        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-pink-50 text-pink-500">
            Pendding
        </span>
    </div>

    <div class="flex-1 text-right pr-10">
        <span>{{ $model->cpf }}</span>
    </div>

    <div class="justify-items-end">
        <button wire:click="markParticipationFinished({{$model->id}})" class="p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap w-5 h-5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </button>
    </div>

    <x-lv-actions :actions="$actions" :model="$model" />
</div>

