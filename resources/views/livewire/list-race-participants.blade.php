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
        <button class="p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
        </button>

        <button class="p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
        </button>
    </div>

    <x-lv-actions :actions="$actions" :model="$model" />
</div>

