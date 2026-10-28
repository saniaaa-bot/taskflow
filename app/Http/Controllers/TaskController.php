<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 1. Saare tasks dekhne ke liye
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    // 2. Naya task save karne ke liye
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Pending',
            'due_date' => $request->due_date,
        ]);

        return redirect()->back()->with('success', 'Task added successfully!');
    }

    // 3. Task Delete karne ke liye
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }

    // 4. Task ka status change karne ke liye
    public function updateStatus($id)
    {
        $task = Task::findOrFail($id);
        
        // Agar Pending hai toh Completed kar do, aur Completed hai toh Pending
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return redirect()->back();
    }

        // Edit form dikhane ke liye
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('edit_task', compact('task'));
    }

    // Task ko update karne ke liye
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect('/')->with('success', 'Task updated successfully!');
    }
}