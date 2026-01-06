@extends('Layout.layout')

@section('title', 'Add Task')

@section('content')
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
<div class="max-w-4xl mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Add Task</h1>
        </div>

        <a
            href="{{ route('tasks.index') }}"
            class="inline-flex items-center gap-2 rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600
                   hover:bg-slate-50 hover:border-slate-400 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Tasks
        </a>
    </div>

    {{-- Add Task Form --}}
    <div class="w-full max-w-lg mx-auto">
        <form method="POST" action="/tasks"
              class="space-y-6 rounded-xl bg-white p-8 shadow-lg ring-1 ring-slate-200">
            @csrf

            <div class="text-center">
                <h2 class="text-xl font-semibold text-slate-800 mb-2">Create New Task</h2>
                <p class="text-sm text-slate-600">Fill in the details below to add your task.</p>
            </div>

            <div class="space-y-2">
                <label for="title" class="flex items-center gap-2 text-sm font-medium text-slate-700">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Title
                </label>
                <input
                    id="title"
                    type="text"
                    name="title"
                    placeholder="e.g. Finish report"
                    required
                    class="block w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                           focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40 transition-colors duration-200"
                >
            </div>

            <div class="space-y-2">
                <label for="description" class="flex items-center gap-2 text-sm font-medium text-slate-700">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    Description
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Add a short description"
                    required
                    class="block w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                           focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40 transition-colors duration-200 resize-none"
                ></textarea>
            </div>

            <div class="space-y-2">
                <label for="priority" class="flex items-center gap-2 text-sm font-medium text-slate-700">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    Priority
                </label>
                <select
                    id="priority"
                    name="Priority"
                    required
                    class="block w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900
                           focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40 transition-colors duration-200"
                >
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-200">
                <a
                    href="{{ route('tasks.index') }}"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-600
                           hover:bg-slate-50 hover:border-slate-400 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white
                           shadow-lg shadow-indigo-500/30 transition-all duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-500/40
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:scale-105"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Save Task
                </button>
            </div>
        </form>
        @error('title')
            <div class="mt-2 text-sm text-red-600">Error: {{ $message }}</div>
        @enderror
    </div>
</div>
</body>
@endsection