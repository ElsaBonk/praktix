<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktix - Internship & Training Platform</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-950 via-slate-900 to-indigo-950 text-white min-h-screen">

    <!-- NAVBAR -->
    <header class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

            <div>
                <h1 class="text-2xl font-bold">
                    Praktix
                </h1>
            </div>

            <div class="flex items-center gap-4">

                <a href="{{ route('programs.index') }}"
                   class="text-gray-300 hover:text-white transition">
                    Programs
                </a>

                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-xl border border-white/20 hover:bg-white/10 transition">
                    Sign In
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 transition">
                    Get Started
                </a>

            </div>

        </div>
    </header>

    <!-- HERO -->
    <section class="max-w-7xl mx-auto px-6 py-24">

        <div class="text-center max-w-4xl mx-auto">

            <div class="inline-block px-4 py-2 mb-6 text-sm bg-indigo-500/20 border border-indigo-400/20 rounded-full">
                Internship & Training Management Platform
            </div>

            <h1 class="text-6xl font-extrabold leading-tight mb-6">
                Discover Opportunities.
                <span class="text-indigo-400">
                    Build Your Future.
                </span>
            </h1>

            <p class="text-xl text-gray-300 mb-10">
                Explore training programs, internships and career opportunities.
                Apply online, upload your CV and track your application status
                through a modern and intuitive platform.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">

                <a href="{{ route('programs.index') }}"
                   class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-semibold shadow-lg transition">
                    Explore Programs
                </a>

                <a href="{{ route('register') }}"
                   class="px-8 py-4 border border-white/20 rounded-xl hover:bg-white/10 transition">
                    Create Account
                </a>

            </div>

        </div>

    </section>

    <!-- FEATURES -->
    <section class="max-w-7xl mx-auto px-6 pb-24">

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                <div class="text-4xl mb-4">📚</div>

                <h3 class="text-xl font-bold mb-3">
                    Browse Programs
                </h3>

                <p class="text-gray-400">
                    Explore available internships, training programs and learning opportunities.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                <div class="text-4xl mb-4">📄</div>

                <h3 class="text-xl font-bold mb-3">
                    Apply Online
                </h3>

                <p class="text-gray-400">
                    Submit your application and CV quickly through a secure process.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                <div class="text-4xl mb-4">📊</div>

                <h3 class="text-xl font-bold mb-3">
                    Track Progress
                </h3>

                <p class="text-gray-400">
                    Follow your application status from submission to final decision.
                </p>
            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="max-w-5xl mx-auto px-6 pb-24">

        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl p-12 text-center">

            <h2 class="text-4xl font-bold mb-4">
                Ready to Start?
            </h2>

            <p class="text-white/80 mb-8">
                Join Praktix today and discover new opportunities for your career growth.
            </p>

            <a href="{{ route('register') }}"
               class="inline-block px-8 py-4 bg-white text-black font-semibold rounded-xl hover:bg-gray-100 transition">
                Create Your Account
            </a>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="border-t border-white/10">

        <div class="max-w-7xl mx-auto px-6 py-8 text-center text-gray-500">
            © {{ date('Y') }} Praktix. All Rights Reserved.
        </div>

    </footer>

</body>
</html>