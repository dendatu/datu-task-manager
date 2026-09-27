<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-indigo-50/60 via-white to-white min-h-[calc(100vh-4rem)]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Hero / Welcome Card -->
            <div class="relative overflow-hidden bg-white shadow-sm border border-gray-100 rounded-2xl p-8 sm:p-10">
                <!-- decorative accent blob -->
                <div class="absolute -top-16 -right-16 w-56 h-56 bg-gradient-to-br from-indigo-200 to-violet-200 rounded-full opacity-40 blur-2xl"></div>
                <div class="absolute -bottom-20 -left-10 w-40 h-40 bg-gradient-to-tr from-emerald-100 to-teal-100 rounded-full opacity-50 blur-2xl"></div>

                <div class="relative">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-600 text-white shadow-sm mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-800">Welcome back{{ Auth::user() ? ', ' . explode(' ', Auth::user()->name)[0] : '' }} 👋</h1>
                    <p class="text-gray-500 mt-2 max-w-xl">
                        This is your personal <span class="font-medium text-gray-700">Task Manager</span> —
                        a simple space to jot down what needs doing, track what's in progress, and clear it
                        off your plate. Everything you add here is private to your account.
                    </p>

                    <a href="{{ route('tasks.index') }}"
                       class="inline-flex items-center gap-2 mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-lg shadow-sm transition">
                        Go to My Tasks
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick "what you can do" cards -->
            <div class="grid sm:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800 text-sm">Add tasks</p>
                    <p class="text-gray-500 text-sm mt-1">Quickly capture anything you need to remember or get done.</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800 text-sm">Edit anytime</p>
                    <p class="text-gray-500 text-sm mt-1">Update titles and details as things change.</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm">
                    <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-rose-50 text-rose-500 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800 text-sm">Stay tidy</p>
                    <p class="text-gray-500 text-sm mt-1">Remove tasks once they're done — no clutter left behind.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>