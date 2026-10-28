<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Ultimate</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"DM Sans"', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            purple: '#8B5CF6',
                            pink: '#EC4899',
                            dark: '#111827'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .bg-mesh {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(at 40% 20%, hsla(280,100%,76%,0.3) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(189,100%,56%,0.3) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355,100%,93%,0.3) 0px, transparent 50%),
                radial-gradient(at 80% 50%, hsla(340,100%,76%,0.3) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(22,100%,77%,0.3) 0px, transparent 50%),
                radial-gradient(at 80% 100%, hsla(242,100%,70%,0.3) 0px, transparent 50%),
                radial-gradient(at 0% 0%, hsla(343,100%,76%,0.3) 0px, transparent 50%);
        }
    </style>
</head>
<body class="min-h-screen bg-mesh font-sans text-slate-800 p-4 md:p-8 flex justify-center items-start">

    <div class="max-w-5xl w-full mt-4">
        
        <header class="flex justify-between items-center mb-8 bg-white/60 backdrop-blur-lg px-6 py-4 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/80">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-tr from-brand-purple to-brand-pink rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h1 class="text-2xl font-heading font-extrabold text-brand-dark tracking-tight">TaskFlow.</h1>
            </div>
        </header>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative mb-6 shadow-sm" role="alert">
                <span class="block sm:inline font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-1 bg-white/80 backdrop-blur-xl p-6 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white h-fit">
                <h2 class="text-xl font-heading font-bold text-brand-dark mb-6">Add a Task</h2>
                
                <form action="{{ route('tasks.store') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="title" placeholder="e.g., Design System" class="w-full bg-slate-100/50 border border-slate-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-purple/50 transition-all font-medium" required>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Description</label>
                        <textarea name="description" placeholder="Write details here..." rows="3" class="w-full bg-slate-100/50 border border-slate-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-purple/50 transition-all font-medium" required></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Due Date</label>
                        <input type="date" name="due_date" class="w-full bg-slate-100/50 border border-slate-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-purple/50 transition-all font-medium text-slate-600">
                    </div>
                    
                    <button type="submit" class="mt-4 w-full bg-gradient-to-r from-brand-purple to-brand-pink text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:-translate-y-0.5 transition-all duration-200">
                        Create Task
                    </button>
                </form>
            </div>

            <div class="md:col-span-2 flex flex-col gap-4">
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/80 backdrop-blur-xl p-5 rounded-[2rem] shadow-sm border border-white flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-slate-500">Total Tasks</p>
                            <p class="text-3xl font-heading font-extrabold text-brand-purple mt-1">{{ $tasks->count() }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-xl p-5 rounded-[2rem] shadow-sm border border-white flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-slate-500">Completed</p>
                            <p class="text-3xl font-heading font-extrabold text-green-500 mt-1">{{ $tasks->where('status', 'Completed')->count() }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white/60 backdrop-blur-xl p-6 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white h-full">
                    <h3 class="text-lg font-heading font-bold text-brand-dark mb-4">Your Tasks</h3>
                    
                    <div class="space-y-3">
                        @if($tasks->isEmpty())
                            <p class="text-center text-slate-500 py-6">No tasks yet. Add your first task!</p>
                        @else
                            @foreach($tasks as $task)
                                <div class="flex items-center gap-4 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                                    
                                    <form action="{{ route('tasks.status', $task->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center group-hover:border-brand-purple transition-colors {{ $task->status == 'Completed' ? 'bg-green-500 border-green-500' : '' }}">
                                            @if($task->status == 'Completed')
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                            @endif
                                        </button>
                                    </form>

                                    <div class="flex-1 {{ $task->status == 'Completed' ? 'opacity-50 line-through' : '' }}">
                                        <h4 class="font-bold text-slate-800 transition-colors">{{ $task->title }}</h4>
                                        <p class="text-sm text-slate-500 mt-0.5 transition-colors">{{ $task->description }}</p>
                                        @if($task->due_date)
                                            <p class="text-xs text-brand-purple font-semibold mt-1">Due: {{ $task->due_date }}</p>
                                        @endif
                                    </div>
                                    
                                    <span class="text-xs font-bold {{ $task->status == 'Pending' ? 'text-yellow-600 bg-yellow-100' : 'text-green-600 bg-green-100' }} px-3 py-1 rounded-lg">
                                        {{ $task->status }}
                                    </span>

                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-400 hover:text-blue-600 font-bold text-sm mr-2 transition-colors" title="Edit Task">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 transition-colors" title="Delete Task">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>