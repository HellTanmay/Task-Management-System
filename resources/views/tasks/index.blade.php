
@extends('Layout.layout')

@section('title', 'Tasks')

@section('content')
<body class="bg-slate-100">
<div class="max-w-4xl mx-auto px-4 py-8">

    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-900">Task Manager</h1>

        <a
            href="{{ route('tasks.addtasks') }}"
            class="inline-flex items-center gap-2 rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white
                   shadow-md shadow-indigo-500/30 transition hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/40
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
            <span class="text-lg leading-none">＋</span>
            <span>Add task</span>
        </a>
    </div>

    {{-- Task List (visible on load) --}}
    <div class="w-full max-w-4xl">
        <h2 class="mb-3 text-lg font-semibold text-slate-800">Tasks</h2>

        <div class="divide-y divide-slate-200 rounded-xl bg-white shadow-md ring-1 ring-slate-200">
            @forelse($tasks as $task)
                <div class="flex flex-col gap-3 px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex-1">
                        <form method="POST" action="/tasks/{{ $task->id }}" class="flex items-center gap-2">
                            @csrf
                            @method('PUT')

                            <input
                                type="text"
                                name="title"
                                value="{{ $task->title }}"
                                class="w-full rounded-lg border border-slate-300 bg-slate-50 px-3 py-1.5 text-sm text-slate-900
                                       focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/40"
                            >

                            <button
                                type="submit"
                                class="hidden rounded-full bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white
                                       shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2
                                       focus:ring-emerald-500 focus:ring-offset-1 sm:inline-flex"
                            >
                                Update
                            </button>
                        </form>
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        {{-- Update button for mobile --}}
                        <form method="POST" action="/tasks/{{ $task->id }}" class="sm:hidden">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="title" value="{{ $task->title }}">
                            <button
                                type="submit"
                                class="rounded-full bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white
                                       shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2
                                       focus:ring-emerald-500 focus:ring-offset-1"
                            >
                                Update
                            </button>
                        </form>

                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="rounded-full bg-rose-600 px-3 py-1.5 text-xs font-semibold text-white
                                       shadow-sm transition hover:bg-rose-700 focus:outline-none focus:ring-2
                                       focus:ring-rose-500 focus:ring-offset-1"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="px-4 py-4 text-sm text-slate-500">
                    No tasks yet. Click “Add task” to create one.
                </p>
            @endforelse
        </div>
    </div>
</div>
</body>
@endsection

