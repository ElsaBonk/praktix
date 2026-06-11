<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Applications</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white min-h-screen">

<div class="max-w-6xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-8">My Applications</h1>

    <div class="grid md:grid-cols-2 gap-6">

        @forelse($applications as $app)

            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">

                <h2 class="text-xl font-semibold mb-2">
                    {{ $app->program->title ?? 'Program deleted' }}
                </h2>

                <p class="text-gray-400 text-sm">
                    {{ $app->created_at->format('d M Y') }}
                </p>

                <div class="mt-3">
                    <span class="px-3 py-1 text-xs rounded-full
                        @if($app->status == 'Accepted') bg-green-500/20 text-green-300
                        @elseif($app->status == 'Rejected') bg-red-500/20 text-red-300
                        @elseif($app->status == 'Under Review') bg-blue-500/20 text-blue-300
                        @else bg-yellow-500/20 text-yellow-300
                        @endif
                    ">
                        {{ $app->status }}
                    </span>
                </div>

            </div>

        @empty

            <div class="text-gray-400">
                You have no applications yet.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>