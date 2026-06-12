<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-950 via-slate-900 to-indigo-950 text-white min-h-screen">

<div class="max-w-6xl mx-auto px-6 py-10">

    <div class="flex items-center justify-between mb-8">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}"
           class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>

        <h1 class="text-3xl font-bold">Our Programs</h1>

        <div></div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-xl text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($programs as $program)
            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 hover:border-indigo-500 transition">
                <h2 class="text-xl font-semibold mb-2">{{ $program->title }}</h2>

                <span class="inline-block mb-3 px-3 py-1 text-xs rounded-full bg-indigo-600">
                    {{ $program->category }}
                </span>

                <div class="text-sm text-gray-400 space-y-1 mb-4">
                    <p>Duration: {{ $program->duration }}</p>
                    <p>Price: {{ $program->price }} FCFA</p>
                </div>

                <a href="{{ route('programs.show', $program) }}"
                   class="inline-block w-full text-center py-2.5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition font-semibold">
                    View Details
                </a>
            </div>
        @empty
            <div class="col-span-full bg-white/5 border border-white/10 rounded-2xl p-6 text-gray-400 text-center">
                No programs available yet.
            </div>
        @endforelse
    </div>

</div>

</body>
</html>
