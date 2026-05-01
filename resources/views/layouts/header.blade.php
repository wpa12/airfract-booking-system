<header class="bg-blue-900 text-white shadow-md py-6 px-4">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
        <!-- Logo & System Title -->
        <a href="/" class="flex items-center gap-2 group">
            <span class="text-3xl">✈️</span>
            <span class="text-2xl font-bold tracking-tight group-hover:text-blue-300 transition">
                Aircraft Booking System
            </span>
        </a>

        <!-- Navigation -->
        <nav class="flex gap-6">
            <a href="#" class="text-lg font-medium hover:text-blue-300 transition">Home</a>
            <a href="#" class="text-lg font-medium hover:text-blue-300 transition">Bookings</a>
            <a href="#" class="text-lg font-medium hover:text-blue-300 transition">About</a>
            <a href="#" class="text-lg font-medium hover:text-blue-300 transition">Contact</a>
        </nav>

        <!-- (Optional) User Actions -->
        <div class="flex gap-2 mt-4 sm:mt-0">
            <a href="{{ route('login') }}" class="bg-blue-700 hover:bg-blue-600 text-white font-semibold rounded px-4 py-2 transition shadow">
                Log In
            </a>
            <a href="#" class="bg-white text-blue-900 font-semibold rounded px-4 py-2 shadow hover:bg-blue-100 transition">
                Sign Up
            </a>
        </div>
    </div>
</header>