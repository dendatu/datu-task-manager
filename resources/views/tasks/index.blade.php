<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-indigo-50/60 via-white to-white min-h-[calc(100vh-4rem)]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="flex items-center gap-2 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Create Task Form -->
            <div class="relative overflow-hidden bg-white shadow-sm border border-gray-100 rounded-2xl p-6">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-100 rounded-full opacity-40 blur-2xl"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-600 text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-semibold text-gray-800">Add a new task</h3>
                    </div>
                    <form method="POST" action="{{ route('tasks.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Task Title</label>
                            <input type="text" name="title"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-100 transition"
                                   placeholder="e.g. Finish lab report" required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                            <textarea name="description" rows="3"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-100 transition"
                                      placeholder="Optional details..."></textarea>
                        </div>
                        <button type="submit"
                                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-lg shadow-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Task
                        </button>
                    </form>
                </div>
            </div>

            <!-- Task List -->
            <div class="relative overflow-hidden bg-white shadow-sm border border-gray-100 rounded-2xl p-6">
                <div class="absolute -bottom-14 -left-14 w-40 h-40 bg-teal-100 rounded-full opacity-30 blur-2xl"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-teal-500 text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Your Tasks
                            <span class="text-sm font-normal text-gray-400">({{ $tasks->count() }})</span>
                        </h3>
                    </div>

                    <ul class="divide-y divide-gray-100">
                        @forelse ($tasks as $task)
                            <li class="py-3 flex items-center justify-between gap-4 group">
                                <div class="min-w-0">
                                    <p class="font-medium text-gray-800 truncate">{{ $task->title }}</p>
                                    @if ($task->description)
                                        <p class="text-sm text-gray-500 truncate">{{ $task->description }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3 shrink-0 opacity-70 group-hover:opacity-100 transition">
                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                                          onsubmit="return confirm('Delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-medium text-red-500 hover:text-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li class="py-10 text-center text-gray-400">
                                <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                No tasks yet — add one above to get started.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>