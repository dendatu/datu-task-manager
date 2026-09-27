<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-indigo-50/60 via-white to-white min-h-[calc(100vh-4rem)]">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-hidden bg-white shadow-sm border border-gray-100 rounded-2xl p-6">
                <div class="absolute -top-12 -right-12 w-36 h-36 bg-violet-100 rounded-full opacity-40 blur-2xl"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-violet-600 text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-semibold text-gray-800">Edit Task</h3>
                    </div>

                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Task Title</label>
                            <input type="text" name="title" value="{{ $task->title }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-100 transition"
                                   required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                            <textarea name="description" rows="4"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-100 transition">{{ $task->description }}</textarea>
                        </div>
                        <div class="flex items-center gap-3 pt-2">
                            <button type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-lg shadow-sm transition">
                                Update Task
                            </button>
                            <a href="{{ route('tasks.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>