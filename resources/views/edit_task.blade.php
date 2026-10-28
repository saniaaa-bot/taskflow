<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - TaskFlow</title>
    
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
<body class="min-h-screen bg-mesh font-sans text-slate-800 p-4 flex justify-center items-center">

    <div class="max-w-md w-full">
        
        <div class="bg-white/80 backdrop-blur-xl p-8 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white">
            
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-gradient-to-tr from-brand-purple to-brand-pink rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <h2 class="text-2xl font-heading font-extrabold text-brand-dark">Edit Task</h2>
            </div>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Title</label>
                    <input type="text" name="title" value="{{ $task->title }}" class="w-full bg-slate-100/50 border border-slate-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-purple/50 transition-all font-medium" required>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full bg-slate-100/50 border border-slate-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-purple/50 transition-all font-medium" required>{{ $task->description }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Due Date</label>
                    <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full bg-slate-100/50 border border-slate-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-purple/50 transition-all font-medium text-slate-600">
                </div>
                
                <div class="flex gap-3 mt-4">
                    <a href="{{ route('tasks.index') }}" class="w-1/3 text-center bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-3.5 px-4 rounded-xl transition-all duration-200">
                        Cancel
                    </a>
                    <button type="submit" class="w-2/3 bg-gradient-to-r from-brand-purple to-brand-pink text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:-translate-y-0.5 transition-all duration-200">
                        Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>