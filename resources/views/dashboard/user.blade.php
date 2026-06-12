
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-950 via-slate-900 to-indigo-950 text-white min-h-screen">

<!-- NAVBAR -->
<header class="bg-black/40 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <h1 class="text-xl font-bold tracking-wide text-indigo-400">
            Praktix
        </h1>

        <!-- MENU -->
        <nav class="flex items-center gap-8 text-sm text-gray-300">

            <a href="{{ route('dashboard') }}"
               class="hover:text-indigo-400 transition">
                Dashboard
            </a>

            <a href="{{ route('programs.index') }}"
               class="hover:text-indigo-400 transition">
                Programs
            </a>

            <a href="#applications"
               class="hover:text-indigo-400 transition">
                Applications
            </a>

            <a href="{{ route('profile.edit') }}"
               class="hover:text-indigo-400 transition">
                Profile
            </a>

        </nav>

        <!-- USER + LOGOUT -->
        <div class="flex items-center gap-3">

            <span class="text-xs text-gray-400 hidden sm:block">
                {{ auth()->user()->name }}
            </span>

            <button onclick="openModal()"
                class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs shadow-lg transition">
                Logout
            </button>

        </div>

    </div>
</header>

<!-- CONTENT -->
<main class="max-w-6xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="mb-10">
        <h2 class="text-4xl font-extrabold">
            Welcome, <span class="text-indigo-400">{{ auth()->user()->name }}</span>
        </h2>
        <p class="text-gray-400 mt-2">
            Track your applications and explore opportunities
        </p>
    </div>

    <!-- QUICK ACTIONS -->
    <section class="mb-12">

        <h3 class="text-xl font-semibold mb-5 border-l-4 border-indigo-500 pl-3">
            Quick Actions
        </h3>

        <div class="grid md:grid-cols-2 gap-6">

            <a href="{{ route('programs.index') }}"
               class="group bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-indigo-500 hover:bg-white/10 transition">

                <h4 class="text-lg font-semibold group-hover:text-indigo-400">
                    View Programs
                </h4>

                <p class="text-gray-400 text-sm mt-2">
                    Explore training programs and apply easily.
                </p>

            </a>

            <a href="#applications"
               class="group bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-purple-500 hover:bg-white/10 transition">

                <h4 class="text-lg font-semibold group-hover:text-purple-400">
                    My Applications
                </h4>

                <p class="text-gray-400 text-sm mt-2">
                    Track your application progress in real time.
                </p>

            </a>

        </div>

    </section>

    <!-- APPLICATIONS -->
    <section id="applications">

        <h3 class="text-xl font-semibold mb-6 border-l-4 border-indigo-500 pl-3">
            My Applications
        </h3>

        <div class="grid md:grid-cols-2 gap-6">

            @forelse($applications as $app)

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-indigo-500 transition">

                    <div class="flex justify-between items-center mb-4">

                        <h4 class="font-semibold text-lg">
                            {{ $app->program->title ?? 'Program deleted' }}
                        </h4>

                        <!-- STATUS -->
                        <span class="text-xs px-3 py-1 rounded-full font-semibold
                            @if($app->status == 'Accepted') bg-green-500/20 text-green-300
                            @elseif($app->status == 'Rejected') bg-red-500/20 text-red-300
                            @elseif($app->status == 'Under Review') bg-blue-500/20 text-blue-300
                            @else bg-yellow-500/20 text-yellow-300
                            @endif
                        ">
                            {{ $app->status }}
                        </span>

                    </div>

                    <div class="text-sm text-gray-400 space-y-1">
                        <p><span class="text-gray-200">Name:</span> {{ $app->full_name }}</p>
                        <p><span class="text-gray-200">Email:</span> {{ $app->email }}</p>
                    </div>

                </div>

            @empty

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-gray-400">
                    You have no applications yet.
                </div>

            @endforelse

        </div>

    </section>

</main>

<!-- LOGOUT MODAL -->
<div id="logoutModal"
     class="hidden fixed inset-0 bg-black/70 flex items-center justify-center">

    <div class="bg-gray-900 border border-white/10 rounded-2xl p-6 w-80 text-center">

        <h3 class="text-lg font-semibold mb-2">Confirm Logout</h3>
        <p class="text-gray-400 text-sm mb-5">
            Are you sure you want to logout?
        </p>

        <div class="flex justify-center gap-3">

            <button onclick="closeModal()"
                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm">
                Cancel
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm">
                    Logout
                </button>
            </form>

        </div>

    </div>
</div>

<script>
function openModal(){
    document.getElementById('logoutModal').classList.remove('hidden');
}

function closeModal(){
    document.getElementById('logoutModal').classList.add('hidden');
}
</script>

</body>
</html>
