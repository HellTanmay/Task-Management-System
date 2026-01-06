@extends('Layout.layout')

@section('title', 'Tasks')

@section('content')
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
<div class="max-w-5xl mx-auto px-4 py-8">

    <!-- Header Section -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Task Managemet System</h1>
            
        </div>

        <a
            href="{{ route('tasks.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white
                   shadow-lg shadow-indigo-500/30 transition-all duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-500/40
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:scale-105"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Add Task</span>
        </a>
    </div>

    <!-- Task List Section -->
    <div class="w-full">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold text-slate-800">Your Tasks</h2>
            <!-- Optional: Add filter or sort options here if needed -->
        </div>

        <div class="space-y-4">
            @forelse($tasks as $task)
                <div class="{{ $task->Status==='completed'? 'bg-gray-200' :'bg-white'}} rounded-xl shadow-sm ring-1 ring-slate-200 hover:shadow-md transition-shadow duration-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-6">
                        <div class="flex-1 mb-4 sm:mb-0">
                            <!-- Task Title -->
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">
                                {{ $task->title }}
                            </h3>

                            <!-- Task Description -->
                            @if($task->description)
                                <p class="text-sm text-slate-600 mb-3 leading-relaxed">
                                    {{ $task->description }}
                                </p>
                            @endif

                            <!-- Priority Badge -->
                            <span class="inline-flex items-center gap-1 rounded-full px-3 py-1 text-xs font-medium
                                {{ $task->Priority === 'high' ? 'bg-red-100 text-red-800' :
                                   ($task->Priority === 'medium' ? 'bg-yellow-100 text-yellow-800' :
                                    'bg-green-100 text-green-800') }}">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ ucfirst($task->Priority) }} Priority
                            </span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-3 flex-wrap">
                            <!-- Edit Button -->
                            <a
                                href="{{ route('tasks.edit', $task) }}"
                                class="inline-flex items-center gap-2 rounded-lg bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700
                                       hover:bg-slate-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form method="POST" action="/tasks/{{ $task->id }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="inline-flex items-center gap-2 rounded-lg bg-rose-100 px-4 py-2 text-sm font-medium text-rose-700
                                           hover:bg-rose-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2"
                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
                            </form>

                            <!-- Mark as Completed Checkbox -->
                            <form method="POST" action="{{ route('tasks.complete', $task) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        onchange="this.form.submit()"
                                        {{ $task->Status === 'completed' ? 'checked disabled' : '' }}
                                        class="h-5 w-5 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                                    >
                                    <span class="text-sm text-slate-700 font-medium">
                                        {{ $task->Status === 'completed' ? 'Completed' : 'Mark Complete' }}
                                    </span>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-slate-200 p-8 text-center">
                    <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <p class="text-slate-500 text-lg font-medium">No tasks yet.</p>
                    <p class="text-slate-400 text-sm mt-1">Get started by adding your first task!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
</body>
@endsection
