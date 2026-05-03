<header class="bg-blue-900 text-white shadow-md py-6 px-4">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
        <!-- Logo & System Title -->
        <a href="/" class="flex items-center gap-2 group">
            <span class="text-3xl">✈️</span>
            <span class="text-2xl font-bold tracking-tight group-hover:text-blue-300 transition">
                Aircraft Booking System
            </span>
        </a>

        <nav class="flex gap-6">
            <a href="{{ route('dashboard.index') }}" class="text-lg font-medium hover:text-blue-300 transition">Home</a>
            @auth
            <a href="{{ route('dashboard.bookings.index') }}" class="text-lg font-medium hover:text-blue-300 transition">Bookings</a>
            @endauth
            <a href="/about" class="text-lg font-medium hover:text-blue-300 transition">About</a>
        </nav>
        <div class="flex gap-2 mt-4 sm:mt-0">
            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-semibold rounded px-4 py-2 transition shadow">
                        Log Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-blue-700 hover:bg-blue-600 text-white font-semibold rounded px-4 py-2 transition shadow">
                    Log In
                </a>
            @endif
            <a href="#" class="bg-white text-blue-900 font-semibold rounded px-4 py-2 shadow hover:bg-blue-100 transition">
                Sign Up
            </a>
        </div>
    </div>
</header>