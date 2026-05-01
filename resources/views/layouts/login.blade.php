@extends('welcome')
@section('content')
<section class="min-h-[calc(100vh-8rem)] bg-slate-100 px-4 py-12 sm:py-16">
    <div class="mx-auto w-full max-w-md rounded-xl border border-slate-200 bg-white p-8 shadow-lg">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-blue-900">Log In to Aircraft Booking</h2>
            <p class="mt-1 text-sm text-gray-600">Welcome back! Please enter your credentials.</p>
        </div>

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="mb-1 block font-medium text-blue-900">Email Address</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    autofocus
                    class="w-full rounded border border-blue-200 px-4 py-2 transition focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block font-medium text-blue-900">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="w-full rounded border border-blue-200 px-4 py-2 transition focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="********"
                >
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-blue-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember Me</label>
                </div>
                <a href="#" class="text-blue-700 text-sm hover:underline">Forgot Password?</a>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded px-4 py-2 shadow transition"
            >
                Log In
            </button>
        </form>
        <div class="text-center text-sm mt-6 text-gray-600">
            Don’t have an account?
            <a href="#" class="text-blue-700 hover:underline font-medium">Sign Up</a>
        </div>
    </div>
</section>
@endsection
