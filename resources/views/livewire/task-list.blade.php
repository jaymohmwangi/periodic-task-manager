<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tasks') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden  sm:rounded-lg">
            <div class="flex gap-4">
                <!-- Column 1 -->
                <div class="w-1/4">
                    <div class="bg-white overflow-hidden  sm:rounded-lg">
                        <div class="p-4  bg-white border-b border-gray-200">
                            <div class="mb-4 mt-2">
                                <h3 class="font-semibold text-lg pb-4 pt-4">{{ __('New Task') }}</h3>
                                <hr>
                            </div>
                            @livewire('create-task')
                        </div>
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="w-3/4">
                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="bg-white overflow-hidden  sm:rounded-lg">
                                <div class="p-4 bg-white">
                                    <div class="mb-4">
                                        <h3 class="font-semibold text-lg pb-4 ">{{ __('Tasks List') }}</h3>
                                        <hr>
                                    </div>
                                    <!-- Action Alert  -->
                                    <div>
                                        @if (session()->has('success'))
                                            <div class="rounded-md bg-green-500 p-4">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-5 w-5 text-white" fill="none"
                                                             stroke="currentColor" viewBox="0 0 24 24"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3">
                                                        <h3 class="text-sm leading-5 font-medium text-white">
                                                            {{ __('Success') }}
                                                        </h3>
                                                        <div class="mt-2 text-sm leading-5 text-white">
                                                            {{ session('success') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if (session()->has('failed'))
                                            <div class="rounded-md bg-red-100 p-4">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-5 w-5 text-red-400" fill="currentColor"
                                                             viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-9v4a1 1 0 11-2 0v-4a1 1 0 112 0zm-1-4a1 1 0 011-1h.5a1 1 0 010 2h-1a1 1 0 01-1-1zM9 13a1 1 0 112 0v1a1 1 0 11-2 0v-1zm8-3a1 1 0 110 2h-1a1 1 0 110-2h1z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3">
                                                        <h3 class="text-sm leading-5 font-medium text-red-800">
                                                            {{ __('Error') }}
                                                        </h3>
                                                        <div class="mt-2 text-sm leading-5 text-red-700">
                                                            {{ session('failed') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(empty($tasks))
                                        <div class="space-y-4">
                                            <div class="flex flex-col items-center justify-center h-64">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11a1 1 0 11-2 0 1 1 0 012 0zm-.5-3.5a1 1 0 00-1 1V10a1 1 0 102 0v-.5a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="mt-2 text-gray-600 text-lg">
                                                    No records created yet.
                                                </p>
                                            </div>
                                            @endif

                                        @foreach($tasks as $group => $groupTasks)
                                                <div>
                                                    <h3 class="font-semibold text-lg pb-4 pt-4">{{ $group }}</h3>
                                                    <!-- Table  -->
                                                    <table class="w-full min-w-full divide-y divide-gray-200">
                                                        <tbody class="bg-white divide-y divide-gray-200">

                                                        @foreach($groupTasks as $task)
                                                            <!-- Row  -->
                                                            <tr class="border-b hover:bg-gray-50 hover:text-gray-900">
                                                                <!-- Column -->
                                                                <td class="px-4 py-1 whitespace-nowrap text-left">
                                                                    <h1 class="font-semibold font-medium ">{{ $task->name??"" }}</h1>
                                                                    <p class="text-sm ring-gray-300"> {{ $task->description??"" }}</p>
                                                                </td>
                                                                <!-- Column -->
                                                                <td class="px-4 py-1 whitespace-nowrap text-left">
                                                                 <span class="p-2 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm border border-indigo-400  text-indigo-700 bg-transparent hover:bg-gray-50">
                                                                       {{ $task->frequency??"" }}
                                                                       </span>
                                                                </td>
                                                                <!-- Column -->
                                                                <td class="px-4 py-1 whitespace-nowrap text-left">
                                                                 <span class="p-2 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm border border-indigo-400  text-indigo-700 bg-transparent hover:bg-gray-50">
                                                                       {{ $task->taskGroup->name??"" }}
                                                                       </span>
                                                                </td>
                                                                <!-- Column -->
                                                                <td class="px-4 py-1 whitespace-nowrap text-left">
                                                                    <p class="text-sm ring-gray-300">
                                                                        Due Date: {{\Carbon\Carbon::parse($task->due_date)->format('d,M,Y')}}</p>
                                                                </td>
                                                                <!-- Column  -->
                                                                <td class="px-6 py-4 whitespace-nowrap text-right  pl-4">
                                                                    <div class="flex justify-end">
                                                                        <x-jet-button
                                                                            wire:click="markAsCompleted({{ $task->id }})"
                                                                            wire:loading.attr="disabled">
                                                                            {{ __('Completed') }}
                                                                        </x-jet-button>
                                                                        <img wire:loading
                                                                             wire:target="markAsCompleted({{ $task->id }})"
                                                                             src="https://trophyoak.com/views/site/images/global/icons/loading.gif"
                                                                             class="animate-spin inline-block sm:w-10">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
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
<!-- Create TaskGroup Modal   -->
<div id="createTaskGroupModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden transform transition-all w-1/4 md:w-3/4 lg:w-1/2 max-w-sm mx-auto" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-gray-50 px-4 py-3 border-b">
                    <div class="p-6">
                        <div class="mb-4 mt-2">
                            <h3 class="font-semibold text-lg pb-4 pt-4">{{ __('New Task Group') }}</h3>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            @livewire('create-task-group')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

    //open create task group modal
    function openCreateTaskGroupModal() {
        var modal = document.getElementById("createTaskGroupModal");
        modal.classList.remove("hidden");
    }
    //close create task group modal
    function closeCreateTaskGroupModal() {
        var modal = document.getElementById("createTaskGroupModal");
        modal.classList.add("hidden");
    }
</script>

