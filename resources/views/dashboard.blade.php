<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid max-w-7xl mx-auto pb-10 px-8 mx-4 rounded-3xl ">
        <div class="grid grid-cols-12 gap-6">
            <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                <div class="col-span-12 mt-8">
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <a href="{{ route('runners') }}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                            <div class="p-5">
                                <div class="flex justify-between">
                                    <span class="h-4 w-4">
                                        {{ svg('heroicon-o-user-group') }}
                                    </span>
                                    <div class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                        <span class="flex items-center">30%</span>
                                    </div>
                                </div>
                                <div class="ml-2 w-full flex-1">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8">4.510</div>
                                        <div class="mt-1 text-base text-gray-600">Runners</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('races') }}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                            <div class="p-5">
                                <div class="flex justify-between">
                                    <span class="h-4 w-4">
                                        {{ svg('heroicon-o-map') }}
                                    </span>
                                    <div class="bg-red-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                        <span class="flex items-center">4%</span>
                                    </div>
                                </div>
                                <div class="ml-2 w-full flex-1">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8">40</div>
                                        <div class="mt-1 text-base text-gray-600">Races</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                            <div class="p-5">
                                <div class="flex justify-between">
                                    <span class="h-4 w-4">
                                        {{ svg('heroicon-o-document-report') }}
                                    </span>
                                    <div class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                        <span class="flex items-center">1%</span>
                                    </div>
                                </div>
                                <div class="ml-2 w-full flex-1">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8">81</div>
                                        <div class="mt-1 text-base text-gray-600">Champions</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                            <div class="p-5">
                                <div class="flex justify-between">
                                    <span class="h-4 w-4">
                                        {{ svg('heroicon-o-users') }}
                                    </span>
                                </div>
                                <div class="ml-2 w-full flex-1">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8">81</div>
                                        <div class="mt-1 text-base text-gray-600">Members</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-span-12 mt-5">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                        <div class="bg-white p-4 shadow-lg rounded-lg">
                            <h1 class="font-bold text-base">Recent runners</h1>
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto">
                                        <div class="py-2 align-middle inline-block min-w-full">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead>
                                                    <tr>
                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">NAME</span>
                                                            </div>
                                                        </th>
                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Code</span>
                                                            </div>
                                                        </th>
                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">STATUS</span>
                                                            </div>
                                                        </th>
                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">ACTION</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                            <p>Albert Einstein</p>
                                                            <p class="text-xs text-gray-400">40 Years</p>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                            <p>77</p>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                            <div class="flex text-green-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /> </svg>
                                                                <p>Active</p>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                            <div class="flex space-x-4">
                                                                <a href="#" class="text-blue-500 hover:text-blue-600">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /> </svg>
                                                                    <p>Edit</p>
                                                                </a>
                                                                <a href="#" class="text-red-500 hover:text-red-600">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /> </svg>
                                                                    <p>Delete</p>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
