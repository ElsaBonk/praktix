<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500">

    <div class="w-full max-w-md bg-white/95 backdrop-blur-xl shadow-2xl rounded-2xl p-8">

        <!-- HEADER -->
        <div class="text-center mb-6">
            <div class="w-12 h-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
                WELCOME
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mt-3">
                Create an Account
            </h2>

            <p class="text-sm text-gray-500">
                Sign up to get started
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="text-sm text-gray-600">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full mt-1 px-4 py-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 px-4 py-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm -->
            <div>
                <label class="text-sm text-gray-600">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full mt-1 px-4 py-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
            </div>

            <!-- BUTTON -->
            <button class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">
                Sign Up
            </button>

            <!-- LOGIN LINK -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">
                    Sign in
                </a>
            </p>
        </form>

    </div>

</body>
</html>