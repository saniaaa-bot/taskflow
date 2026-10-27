<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Yeh function tasks ko database se le kar website par dikhayega
    public function index()
    {
        $tasks = Task::all(); // Saare tasks uthaye
        return view('tasks', compact('tasks')); // tasks.blade.php mein bhej diye
    }

    // Yeh function form se data le kar database mein save karega
    public function store(Request $request)
    {
        // 1. Data ko check karein (Validation)
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        // 2. Database mein naya task banayein
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Pending', // Shuru mein sab Pending honge
            'due_date' => $request->due_date,
        ]);

        // 3. Wapas page par jayein success message ke sath
        return redirect()->back()->with('success', 'Task added successfully!');
    }
}