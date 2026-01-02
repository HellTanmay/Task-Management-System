@extends('Layout.layout')

@section('title', 'AddTasks')

@section('content')
<body class="bg-slate-100">
<div class="max-w-4xl mx-auto px-4 py-8">
    {{-- Header --}}
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-900">Add Task</h1>

        <a
            href="{{ route('tasks.index') }}"
            class="rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-600
                   hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-1"
        >
            Back to tasks
        </a>
    </div>

    {{-- Add Task Form --}}
    <div class="w-full max-w-lg">
        <form method="POST" action="/tasks"
              class="space-y-4 rounded-xl bg-white/90 p-6 shadow-lg ring-1 ring-slate-200">
            @csrf

            <h2 class="text-lg font-semibold tracking-tight text-slate-800">
                Add new task
            </h2>

            <div class="space-y-1.5">
                <label for="title" class="block text-sm font-medium text-slate-700">
                    Title
                </label>
                <input
                    id="title"
                    type="text"
                    name="title"
                    placeholder="e.g. Finish report"
                    required
                    class="block w-full rounded-lg border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400
                           focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40"
                >
            </div>

            <div class="space-y-1.5">
                <label for="description" class="block text-sm font-medium text-slate-700">
                    Description
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Add a short description"
                    required
                    class="block w-full rounded-lg border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400
                           focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40"
                ></textarea>
            </div>

            <div class="space-y-1.5">
                <label for="priority" class="block text-sm font-medium text-slate-700">
                    Priority
                </label>
                <select
                    id="priority"
                    name="Priority"
                    required
                    class="block w-full rounded-lg border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900
                           focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40"
                >
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <div class="flex items-center justify-end gap-3">
                <a
                    href="{{ route('tasks.index') }}"
                    class="rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-600
                           hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-1"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white
                           shadow-md shadow-indigo-500/30 transition hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/40 focus:outline-none
                           focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Save task
                </button>
            </div>
        </form>
    </div>
</div>
</body>
@endsection
