<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use PHPUnit\Event\TestSuite\Sorted;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByRaw("
    CASE priority
        WHEN 'high' THEN 1 
        WHEN 'medium' THEN 2
        WHEN 'low' THEN 3
    END
   
")->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.addtasks');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'Priority' => 'required|in:low,medium,high',
        ],
        ['title.max'=>'Title should not exceed 50 characters.']
        );

        Task::create([
            ...$validated,
            'Status' => 'pending',
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'Priority' => 'required|in:low,medium,high',
        ],
        ['title.max'=>'Title should not exceed 50 characters.']
    );

        $task->update($validated);

        return redirect()->route('tasks.index');
    }

    public function complete(Task $task)
    {
        $task->update([
            'Status' => 'completed'
        ]);

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
